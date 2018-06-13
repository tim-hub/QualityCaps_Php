<?php

namespace App\Http\Controllers;

use App\Models\Cap;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('carts.index');
//        return view('categories.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id =$request->id;
        $name = $request->name;
        $price = $request->price;
        $count =1;
        //
//        Cart::associate('Cap','App')->add($request->id, $request->name, 1, $request->price);

        Cart::add($id, $name, $price, $count)->associate('App\Models\Cap');
        return redirect()->route('carts.index')->withSuccessMessage('Item was added to your carts!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Cart::remove($id);
        return redirect()->route('carts.index')->withSuccessMessage('Item has been removed!');
    }
}
