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
                    <form action="{{ route('caps.update', $cap->id) }}"
                        enctype="multipart/form-data"
                        method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('caps.store') }}" method="POST"
                    enctype="multipart/form-data" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                    <label for="category_id-field">Category</label>
                    {{-- <input class="form-control" type="text" name="category_id" id="category_id-field" value="{{ old('category_id', $cap->category_id ) }}" /> --}}
                    <select class="form-control" name="category_id" id="category_id-field">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">
                            {{$category -> name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplier_id-field">Supplier</label>
                    {{-- <input class="form-control" type="text" name="supplier_id" id="supplier_id-field" value="{{ old('supplier_id', $cap->supplier_id ) }}" /> --}}
                    <select class="form-control" name="supplier_id" id="supplier_id-field">
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">
                            {{$supplier -> name}}
                        </option>
                        @endforeach
                    </select>

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
                    @if($cap->id)
                    <label for="image-field">Image URL</label>
                    <input class="form-control" type="text" name="image" id="image-field" value="{{ old('price', $cap->image ) }}" />
                    @else
                    <label for="image-field">Image File</label>
                    <input class="form-control" type="file" name="image" id="image-field" value="{{ old('image', $cap->image ) }}" />
                    @endif
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
