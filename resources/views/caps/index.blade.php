@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Cap
                    <a class="btn btn-success pull-right" href="{{ route('caps.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($caps->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Category_id</th> <th>Supplier_id</th> <th>Name</th> <th>Description</th> <th>Price</th> <th>Image</th>
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($caps as $cap)
                                <tr>
                                    <td class="text-center"><strong>{{$cap->id}}</strong></td>

                                    <td>{{$cap->category_id}}</td> <td>{{$cap->supplier_id}}</td> <td>{{$cap->name}}</td> <td>{{$cap->description}}</td> <td>{{$cap->price}}</td> <td>{{$cap->image}}</td>



                                    <td class="text-right">
                                        <ul class="d-inline-flex">

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-primary" href="{{ route('caps.show', $cap->id) }}">
                                            Detail
                                        </a>
                                        </li>

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-warning" href="{{ route('caps.edit', $cap->id) }}">
                                            Edit
                                        </a>
                                        </li>

                                        <li class="list-inline-item">
                                        <form action="{{ route('caps.destroy', $cap->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">

                                            <button type="submit" class="btn btn-xs btn-danger">
                                                Delete

                                             </button>
                                        </form>
                                        </li>
                                        </ul>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $caps->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
