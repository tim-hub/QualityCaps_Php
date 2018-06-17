<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupplierRequest;

class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

	public function index()
    {
		$suppliers = Supplier::paginate();
		return view('suppliers.index', compact('suppliers'));
	}

    public function show(Supplier $supplier)
    {

        return view('suppliers.show', compact('supplier'));
    }

	public function create(Supplier $supplier)
	{
        $this->authorize('update', $supplier);
		return view('suppliers.create_and_edit', compact('supplier'));
	}

	public function store(SupplierRequest $request)
	{

		$supplier = Supplier::create($request->all());
		return redirect()->route('suppliers.show', $supplier->id)->with('message', 'Created successfully.');
	}

	public function edit(Supplier $supplier)
	{
        $this->authorize('update', $supplier);
		return view('suppliers.create_and_edit', compact('supplier'));
	}

	public function update(SupplierRequest $request, Supplier $supplier)
	{
		$this->authorize('update', $supplier);
		$supplier->update($request->all());

		return redirect()->route('suppliers.show', $supplier->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Supplier $supplier)
	{
		$this->authorize('destroy', $supplier);
		$supplier->delete();

		return redirect()->route('suppliers.index')->with('message', 'Deleted successfully.');
	}
}
