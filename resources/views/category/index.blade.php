@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body">

                        <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Description</td>
                                        <td>Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key => $value)

                                        <tr>
                                            <td>
                                                {{ $value -> id}}
                                            </td>
                                            <td>
                                                    <a href="{{action('CategoryController@show', $value -> id)}}" class="">{{ $value->name }}</a>

                                            </td>

                                            <td>
                                                    {{ $value->description }}
                                            </td>

                                            <td>
                                                <ul class="d-inline-flex">
                                                    <li class="list-inline-item">
                                                        <a href="{{action('CategoryController@edit', $value -> id)}}" class="btn btn-warning">Edit</a>

                                                    </li>
                                                    <li class="list-inline-item">

                                                    <form action="{{action('CategoryController@destroy', $value -> id)}}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>


                                                    </li>

                                                </ul>



                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                        </table>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection
