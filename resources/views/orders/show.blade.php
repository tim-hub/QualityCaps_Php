@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-1">

    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h1>Order  #{{ $order->id }}</h1>
            </div>

            <div class="card-body">


                <p><label class="text-muted">User: </label>
                    {{ $order->user->name }}
                </p>
                <p><label> Status: </label>
                    {{ $order-> status }}
                </p>
                {{--<p>--}}
                    {{--<label>Gst: </label>--}}
                    {{--{{ $order->gst }}--}}
                {{--</p>--}}

                <hr>
                <h3>Freight</h3>

                <label>Send To</label>
                <p>
                    {{ $order->receiver_name }}
                </p> <label>Address</label>
                <p>
                    {{ $order->address }}
                </p>

                <label>Status</label>

                <p>
                    {{$order->status}}
                </p>


                <hr>
                <h3>Summary</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cap</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                    $sum=0
                    @endphp
                @foreach($order-> order_items as $order_item)
                    <tr>
                        <th scope="row"> {{$order_item->id}}</th>

                        <td>


                            {{$order_item -> cap -> name}}



                        </td>
                        <td>
                            {{$order_item -> cap -> price}}


                        </td>
                        <td>
                            {{$order_item -> quantity}}
                        </td>
                        <td>
                            {{$total = $order_item -> quantity *$order_item -> cap -> price }}
                        </td>

                    </tr>

                    @php
                    $sum += $total
                    @endphp

                @endforeach
                    <tr class="border-bottom">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Subtotal</td>
                        <td>{{$sum}}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>GST 15%</td>
                        <td>{{$sum * $order-> gst}}</td>
                    </tr>
                    <tr class="border-bottom">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{$sum * (1+ $order->gst)}}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-link" href="{{ route('orders.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                    </div>
                    <div class="col-md-6">
                        {{--<a class="btn btn-sm btn-warning pull-right" href="{{ route('orders.edit', $order->id) }}">--}}
                        {{--<i class="glyphicon glyphicon-edit"></i> Edit--}}
                        {{--</a>--}}
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
