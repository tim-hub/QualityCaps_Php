@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Order_Item /
                    @if($order__item->id)
                        Edit #{{$order__item->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($order__item->id)
                    <form action="{{ route('order__items.update', $order__item->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('order__items.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                    <label for="cap_id-field">Cap_id</label>
                    <input class="form-control" type="text" name="cap_id" id="cap_id-field" value="{{ old('cap_id', $order__item->cap_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="order_id-field">Order_id</label>
                    <input class="form-control" type="text" name="order_id" id="order_id-field" value="{{ old('order_id', $order__item->order_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="quantity-field">Quantity</label>
                    <input class="form-control" type="text" name="quantity" id="quantity-field" value="{{ old('quantity', $order__item->quantity ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('order__items.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection