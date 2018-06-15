@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Order / Show #{{ $order->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
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

                <label>User_id</label>
<p>
	{{ $order->user_id }}
</p> <label> Status</label>
<p>
	{{ $order-> status }}
</p> <label>Receiver_name</label>
<p>
	{{ $order->receiver_name }}
</p> <label>Gst</label>
<p>
	{{ $order->gst }}
</p> <label>Address</label>
<p>
	{{ $order->address }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
