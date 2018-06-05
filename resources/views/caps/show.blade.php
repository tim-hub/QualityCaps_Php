@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Cap / Show #{{ $cap->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('caps.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('caps.edit', $cap->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Chema=category_id</label>
<p>
	{{ $cap->chema=category_id }}
</p> <label>Supplier_id</label>
<p>
	{{ $cap->supplier_id }}
</p> <label>Name</label>
<p>
	{{ $cap->name }}
</p> <label>Description</label>
<p>
	{{ $cap->description }}
</p> <label>Price</label>
<p>
	{{ $cap->price }}
</p> <label>Image</label>
<p>
	{{ $cap->image }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
