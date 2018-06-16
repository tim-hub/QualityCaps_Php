@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-edit"></i> User /
                    @if($user->id)
                        Edit #{{$user->id}}
                    @else
                        Create
                    @endif
                </h1>
            </div>

            @include('common.error')

            <div class="panel-body">
                @if($user->id)
                    <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('users.store') }}" method="POST" accept-charset="UTF-8">
                @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                <div class="form-group">
                	<label for="name-field">Name</label>
                	<input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name ) }}" />
                </div>
                <div class="form-group">
                	<label for="address-field">Address</label>
                	<textarea name="address" id="address-field" class="form-control" rows="3">{{ old('address', $user->address ) }}</textarea>
                </div>
                <div class="form-group">
                	<label for="email-field">Email</label>
                	<input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email ) }}" />
                </div>
                        <hr>
                            The fields below that only managers/administrators can edit.
                        <hr>
                <div class="form-group">
                    <label for="role-field">Role</label>


                    <input class="form-control"
                           @if (Auth::user()->role <7))
                            disabled
                           @endif

                           type="text" name="role" id="role-field" value="{{ old('role', $user->role ) }}" />

                </div>
                <div class="form-group">
                    <label for="email_confirmed-field">Email_confirmed</label>
                    <input class="form-control"

                           @if (Auth::user()->role <7))
                           disabled
                           @endif
                           type="text" name="email_confirmed" id="email_confirmed-field" value="{{ old('email_confirmed', $user->email_confirmed ) }}" />
                </div>
                <div class="form-group">
                    <label for="enabled-field">Enabled</label>
                    <input class="form-control"
                           @if (Auth::user()->role <7))
                           disabled
                           @endif
                           type="text" name="enabled" id="enabled-field" value="{{ old('enabled', $user->enabled ) }}" />
                </div>

                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-link pull-right" href="{{ route('users.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
