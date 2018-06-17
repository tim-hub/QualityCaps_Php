<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
//        $this->authorize('view');
        $c_user = \Auth::user();

        echo $c_user;

        if ( (int)$c_user->role >0){

            $orders = Order::paginate(16);

        }else{

            $orders = new Order();
            $orders = $orders->where('user_id', $c_user->id) ->paginate(16);

        }


//		$orders = Order::paginate();
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

        foreach (Cart::content() as $cart){

            $item = new Order_Item();

            $item->cap_id = $cart ->id;
            $item->quantity = $cart -> qty;
            $item->order_id = $order -> id;

            $item->save();
        }


        Cart::destroy();


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

        if ($order){

            $this->authorize('update', $order);

            $order -> status +=1;

            if ($order-> status >2){
                $order -> status =0;
            }

            $order -> save();
        }



        return redirect()->route('orders.index')->with('message', 'Status updated.');
    }

    public function process_order(Request $request){

        $user = \Auth::user();



        if ($user -> role !== 0){
            return response('Unauthorized.', 401);
        }

        $request->validate([
            'receiver_name' => 'required',
            'address' => 'required',

        ]);

        $order = new Order();

        $order-> user_id = $user->id;
        $order-> receiver_name = $request -> get('receiver_name');
        $order-> address = $request -> get('address');
        $order->status = 0;

        $order->save();


//        $i=1;
//
//        while( isset($request[$i]) && (!empty($request[$i]))){
//
//            $rowId = $request->get($i);
//
//            $cart =Cart::get($rowId);
//        }

        foreach (Cart::content() as $cart){

            $item = new Order_Item();

            $item->cap_id = $cart ->id;
            $item->quantity = $cart -> qty;
            $item->order_id = $order -> id;

            $item->save();
        }


        Cart::destroy();

        return redirect()->route('orders.show', $order->id)->with('message', 'Order Processed');

    }
}
