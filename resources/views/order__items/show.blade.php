@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Order_Item / Show #{{ $order__item->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('order__items.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('order__items.edit', $order__item->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Cap_id</label>
<p>
	{{ $order__item->cap_id }}
</p> <label>Order_id</label>
<p>
	{{ $order__item->order_id }}
</p> <label>Quantity</label>
<p>
	{{ $order__item->quantity }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
