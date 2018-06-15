<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
        $this->authorize('view');

		$orders = Order::paginate();
		return view('orders.index', compact('orders'));
	}

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

	public function create(Order $order)
	{
		return view('orders.create_and_edit', compact('order'));
	}

	public function store(OrderRequest $request)
	{
		$order = Order::create($request->all());
		return redirect()->route('orders.show', $order->id)->with('message', 'Created successfully.');
	}

	public function edit(Order $order)
	{
        $this->authorize('update', $order);
		return view('orders.create_and_edit', compact('order'));
	}

	public function update(OrderRequest $request, Order $order)
	{
		$this->authorize('update', $order);
		$order->update($request->all());

		return redirect()->route('orders.show', $order->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Order $order)
	{
		$this->authorize('destroy', $order);
		$order->delete();

		return redirect()->route('orders.index')->with('message', 'Deleted successfully.');
	}

    public function change_status(Request $request){


        $id = $request->get('order_id');


        $order = Order::findOrFail($id);

        $this->authorize('update', $order);

        $order -> status +=1;

        if ($order-> status >2){
            $order -> status =0;
        }


        $order -> save();
        return redirect()->route('orders.index')->with('message', 'Status updated.');
    }
}
