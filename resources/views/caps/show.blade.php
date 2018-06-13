@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-success">
            <div class="panel-heading">
            <h3 class="panel-title">{{ $cap->name }} #{{$cap->id}}</h3>
            </div>

            <div class="panel-body">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-6">
                            <a class="btn btn-link" href="{{ route('caps.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                        </div>
                        @if (!Auth::guest() && Auth::user()-> role >0)
                        <div class="col-6">
                             <a class="btn btn-sm btn-warning pull-right" href="{{ route('caps.edit', $cap->id) }}">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-lg-5">
                        <img
                        class="rounded float-left img-fluid"
                        @if (substr($cap->image, 0,5)==='https' )

                        src="{{$cap->image}}"
                        @else
                        src="{{ asset('images/caps/'.$cap->image)}}"
                        @endif

                        />
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <ul class="list-inline">
                                <li class="list-inline-item badge badge-primary">
                                        {{ $cap->supplier->name }}
                                </li>

                                <li class="list-inline-item badge badge-success">
                                        {{ $cap->category->name }}
                                </li>
                            </ul>

                            <hr>
                            <p>
                                {{ $cap->description }}
                            </p>
                            <hr>
                            <h2>
                                $<span
                                class=""
                                >
                                {{ $cap->price }}
                                </span>

                                @include('carts.add')

                                {{--<button class="btn btn-success">--}}
                                    {{--Add To Cart--}}
                                {{--</button>--}}
                            </h2>

                    </div>

                </div>

            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>

@endsection
