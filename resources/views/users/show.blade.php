@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>User / Show #{{ $user->id }}</h1>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-link" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        <div class="col-md-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('users.edit', $user->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                    </div>
                </div>

                <label>Name</label>
<p>
	{{ $user->name }}
</p> <label>Address</label>
<p>
	{{ $user->address }}
</p> <label>Email</label>
<p>
	{{ $user->email }}
</p> <label>Role</label>
<p>
	{{ $user->role }}
</p> <label>Email_confirmed</label>
<p>
	{{ $user->email_confirmed }}
</p> <label>Enabled</label>
<p>
	{{ $user->enabled }}
</p>
            </div>
        </div>
    </div>
</div>

@endsection
