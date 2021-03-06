@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Category / Show #{{ $category->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>

                    </div>
                </div>

                <label>Name</label>
<p>
	{{ $category->name }}
</p> <label>Description</label>
<p>
	{{ $category->description }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
