<?php

namespace App\Http\Controllers;

use App\Models\Cap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CapRequest;

class CapsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$caps = Cap::paginate();
		return view('caps.index', compact('caps'));
	}

    public function show(Cap $cap)
    {
        return view('caps.show', compact('cap'));
    }

	public function create(Cap $cap)
	{
        $this->authorize('update', $cap);
		return view('caps.create_and_edit', compact('cap'));
	}

	public function store(CapRequest $request)
	{
		$cap = Cap::create($request->all());
		return redirect()->route('caps.show', $cap->id)->with('message', 'Created successfully.');
	}

	public function edit(Cap $cap)
	{
        $this->authorize('update', $cap);
		return view('caps.create_and_edit', compact('cap'));
	}

	public function update(CapRequest $request, Cap $cap)
	{
		$this->authorize('update', $cap);
		$cap->update($request->all());

		return redirect()->route('caps.show', $cap->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Cap $cap)
	{
		$this->authorize('destroy', $cap);
		$cap->delete();

		return redirect()->route('caps.index')->with('message', 'Deleted successfully.');
	}
}
