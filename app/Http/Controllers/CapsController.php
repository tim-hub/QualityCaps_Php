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
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    public function search(Request $request){


        //https://laracasts.com/discuss/channels/laravel/simple-search-in-laravel?page=1

        $caps = Cap::all();

        $error = ['error' => 'No results found, please try with different keywords.'];

        // Making sure the user entered a keyword.
        if($request->has('q')) {
            $q = $request ->get('q');

            $caps = Cap::where(
                        'name', 'like', '%'.$q.'%'
            )
            ->orWhere(
                    'description', 'like', '%'.$q.'%'
            )
            -> get();
        }


        return view('caps.search', compact('caps'));

    }

	public function index(Request $request)
	{
        // http://www.codovel.com/complete-laravel-55-crud-search-sort-and-pagination-tutorial.html
        //

        $category = $request->get('category') != '' ? $request->get('category') : -1;


        $field = $request->get('field') != '' ? $request->get('field') : 'name';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';

        $price = $request->get('price') != '' ? $request->get('price') : -1;

        $results = new Cap();

        if ($category != -1){
            $results = $results->where('category_id', $category);
        }

        if ($price != -1){
            $results = $results->where('price', $price);
        }

        $results = $results -> orderBy($field, $sort)
            ->paginate(16)
            // remember request start with ? combine with &
            ->withPath('?category='.$category.'&field='.$field.'&sort='.$sort.'&price='.$price);

        $caps = $results;
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
