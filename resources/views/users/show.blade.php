@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h1>User / {{ $user->name }}</h1>
            </div>

            <div class="card-body">

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
            <div class="card-footer">

                    <div class="col-md-6">
                        <a class="btn btn-sm btn-primary" href="{{ route('users.index') }}"> Back</a>


                        <a class="btn btn-sm btn-warning pull-right" href="{{ route('users.edit', $user->name) }}">
                            Edit
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
</div>

@endsection
