@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Order /
                    @if($order->id)
                        Edit #{{$order->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($order->id)


                    <form action="{{ route('orders.update', $order->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <hr>
                    <tbody class="text-center text-capitalize">

                            <tr>
                                <td class="table-image"></td>
                                <td></td>
                                <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                                <td>${{ Cart::instance('default')->subtotal() }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="table-image"></td>
                                <td></td>
                                <td class="small-caps table-bg" style="text-align: right">GST 15%</td>
                                <td>${{ Cart::instance('default')->subtotal() *0.15 }}</td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr class="border-bottom">
                                <td class="table-image"></td>
                                <td style="padding: 40px;"></td>
                                <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                                <td class="table-bg">${{ Cart::instance('default')->subtotal() *1.15 }}</td>
                                <td class="column-spacer"></td>
                                <td></td>
                            </tr>

                    </tbody>
                    <hr>
                    <form action="{{ route('orders.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    {{--<label for="user_id-field">User_id</label>--}}
                    <input class="form-control" type="hidden" name="user_id" id="user_id-field"

{{--                           value="{{ old('user_id', $order->user_id ) }}"--}}
                        value="{{Auth::user()->id}}"
                    />
                </div>
                <div class="form-group">
                    {{--<label for=" status-field"> Status</label>--}}
                    <input class="form-control" type="hidden" name="status" id="status-field" value="0" />
                </div>
                <div class="form-group">
                    <label for="gst-field">Gst</label>
                    <input id="gst-field" class="form-control" value="15%" disabled>
                    {{--<input class="form-control" type="text" name="gst" id="gst-field" value="{{ old('gst', $order->gst ) }}" />--}}
                </div>
                <div class="form-group">
                	<label for="receiver_name-field">Receiver Name</label>
                	<input class="form-control" type="text" name="receiver_name" id="receiver_name-field" value="{{ old('receiver_name', $order->receiver_name ) }}" />
                </div>

                <div class="form-group">
                	<label for="address-field">Address</label>
                	<input class="form-control" type="text" name="address" id="address-field" value="{{ old('address', $order->address ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('orders.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
