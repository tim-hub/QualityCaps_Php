<?php

namespace App\Http\Controllers;

use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order_ItemRequest;

class Order_ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$order__items = Order_Item::paginate();
		return view('order__items.index', compact('order__items'));
	}

    public function show(Order_Item $order__item)
    {
        return view('order__items.show', compact('order__item'));
    }

	public function create(Order_Item $order__item)
	{
		return view('order__items.create_and_edit', compact('order__item'));
	}

	public function store(Order_ItemRequest $request)
	{
		$order__item = Order_Item::create($request->all());
		return redirect()->route('order__items.show', $order__item->id)->with('message', 'Created successfully.');
	}

	public function edit(Order_Item $order__item)
	{
        $this->authorize('update', $order__item);
		return view('order__items.create_and_edit', compact('order__item'));
	}

	public function update(Order_ItemRequest $request, Order_Item $order__item)
	{
		$this->authorize('update', $order__item);
		$order__item->update($request->all());

		return redirect()->route('order__items.show', $order__item->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Order_Item $order__item)
	{
		$this->authorize('destroy', $order__item);
		$order__item->delete();

		return redirect()->route('order__items.index')->with('message', 'Deleted successfully.');
	}
}