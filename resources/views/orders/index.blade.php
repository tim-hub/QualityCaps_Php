@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Order
                    {{--<a class="btn btn-success pull-right" href="{{ route('orders.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>--}}
                </h1>
            </div>

            <div class="panel-body">
                @if($orders->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>User</th>

                                <th> Total</th>
                                <th>Gst</th>
                                <th>Receiver_name</th>
                                 <th>Address</th>
                                <th> Status</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center"><strong>{{$order->id}}</strong></td>

                                    <td>{{$order->user->name}}</td>


                                    <td>
                                        {{$order -> grandtotalgst}}
                                    </td>
                                    <td>{{$order->grandtotalgst - $order->grandtotal}}</td>
                                    <td>{{$order->receiver_name}}</td>
                                     <td>{{$order->address}}</td>

                                    <td>

                                        @if ($order-> status == 0)
                                            Waiting
                                        @elseif($order-> status == 1)
                                            Shipping
                                        @else
                                            Done
                                        @endif
                                    </td>

                                    <td class="text-right">
                                        <ul class="d-inline-flex">

                                            <li class="list-inline-item">
                                                <form action="{{ url('orders-change-status') }}" method="POST" style="display: inline;" >
                                                    {{csrf_field()}}
                                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                                    {{--<input type="hidden" name="_method" value="PUT">--}}
                                                    <input type="hidden" name="order_id" value="{{$order->id}}"/>
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        Change

                                                    </button>
                                                </form>
                                            </li>

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-primary" href="{{ route('orders.show', $order->id) }}">
                                            Detail
                                        </a>
                                        </li>

                                        {{--<li class="list-inline-item">--}}
                                        {{--<a class="btn btn-xs btn-warning" href="{{ route('orders.edit', $order->id) }}">--}}
                                            {{--Edit--}}
                                        {{--</a>--}}
                                        {{--</li>--}}

                                        {{--<li class="list-inline-item">--}}
                                        {{--<form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--<input type="hidden" name="_method" value="DELETE">--}}

                                            {{--<button type="submit" class="btn btn-xs btn-danger">--}}
                                                {{--Delete--}}

                                             {{--</button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        </ul>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $orders->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
