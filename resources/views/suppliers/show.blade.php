@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Supplier / Show #{{ $supplier->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('suppliers.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>

                    </div>
                </div>

                <label>Name</label>
<p>
	{{ $supplier->name }}
</p> <label>Description</label>
<p>
	{{ $supplier->description }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
