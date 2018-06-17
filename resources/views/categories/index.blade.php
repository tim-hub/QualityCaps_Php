@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Category
                    @if (!Auth::guest() && Auth::user()-> role >0)
                    <a class="btn btn-success pull-right" href="{{ route('categories.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                    @endif
                </h1>
            </div>

            <div class="panel-body">
                @if($categories->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th> <th>Description</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                            {{-- @foreach($category->caps as $cap)
                                {{$cap->name}}
                            @endforeach --}}
                                <tr>
                                    <td class="text-center"><strong>{{$category->id}}</strong></td>

                                    <td>{{$category->name}}</td> <td>{{$category->description}}</td>

                                    <td class="text-right">
                                        <ul class="d-inline-flex">
                                            <li class="list-inline-item">

                                                <a class="btn btn-xs btn-primary" href="{{ route('categories.show', $category->id) }}">
                                                    Detail
                                                </a>
                                            </li>
                                            @if (!Auth::guest() && Auth::user()-> role >0)
                                            <li class="list-inline-item">

                                                <a class="btn btn-xs btn-warning" href="{{ route('categories.edit', $category->id) }}">
                                                    Edit
                                                </a>
                                            </li>

                                            <li class="list-inline-item">

                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button type="submit" class="btn btn-xs btn-danger">Delete </button>
                                                </form>
                                            </li>
                                                @endif
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $categories->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
