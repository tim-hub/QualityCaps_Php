@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> Cap /
                    @if($cap->id)
                        Edit #{{$cap->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($cap->id)
                    <form action="{{ route('caps.update', $cap->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('caps.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    
                <div class="form-group">
                    <label for="chema=category_id-field">Chema=category_id</label>
                    <input class="form-control" type="text" name="chema=category_id" id="chema=category_id-field" value="{{ old('chema=category_id', $cap->chema=category_id ) }}" />
                </div> 
                <div class="form-group">
                    <label for="supplier_id-field">Supplier_id</label>
                    <input class="form-control" type="text" name="supplier_id" id="supplier_id-field" value="{{ old('supplier_id', $cap->supplier_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $cap->name ) }}" />
                </div> 
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<textarea name="description" id="description-field" class="form-control" rows="3">{{ old('description', $cap->description ) }}</textarea>
                </div> 
                <div class="form-group">
                    <label for="price-field">Price</label>
                    <input class="form-control" type="text" name="price" id="price-field" value="{{ old('price', $cap->price ) }}" />
                </div> 
                <div class="form-group">
                	<label for="image-field">Image</label>
                	<input class="form-control" type="text" name="image" id="image-field" value="{{ old('image', $cap->image ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('caps.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection