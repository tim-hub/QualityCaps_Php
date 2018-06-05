<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * This is a controller written by hand
 *
 *
 */

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        // return View::make('category.index') ->with('categories', $categories);
        return view('category.index', ['categories' => $categories]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('category')->with('success','Information has been  deleted');
    }
}
