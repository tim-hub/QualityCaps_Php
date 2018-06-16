@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> User

                </h1>
            </div>

            <div class="panel-body">
                @if($users->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th> <th>Address</th> <th>Email</th> <th>Confirmed</th> <th>Enabled</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)


                                @if($user -> role !==9)

                                <tr>
                                    <td class="text-center"><strong>{{$user->id}}</strong></td>

                                    <td>{{$user->name}}</td> <td>{{str_limit($user->address, $limit=40)}}</td> <td>{{$user->email}}</td>
                                    <td>{{$user->email_confirmed}}</td> <td>{{$user->enabled}}</td>



                                    <td class="text-right">
                                        <ul class="d-inline-flex">

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-primary" href="{{ route('users.show', $user->id) }}">
                                            Detail
                                        </a>
                                        </li>

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-warning" href="{{ route('users.edit', $user->id) }}">
                                            Edit
                                        </a>
                                        </li>
                                        <li class="list-inline-item">

                                            <form action="{{route('toggle')}}" method="POST">

                                                {{csrf_field()}}

                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <input type="submit"
                                                class="btn btn-success"

                                             @if ($user -> enabled ==0)

                                                value="Enable"
                                               @else
                                               value = "Disable"
                                                @endif

                                                >

                                            </form>

                                        </li>

                                        {{--<li class="list-inline-item">--}}
                                        {{--<form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--<input type="hidden" name="_method" value="DELETE">--}}

                                            {{--<button type="submit" class="btn btn-xs btn-danger">--}}
                                                {{--Delete--}}

                                             {{--</button>--}}
                                        {{--</form>--}}
                                        {{--</li>--}}
                                        </ul>
                                    </td>

                                </tr>

                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
