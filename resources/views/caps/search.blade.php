@extends('layouts.app')

@section('content')
<div class="container">
    @if($caps->count())
    <div class="row">
        <h2>
        Searching Results
        </h2>

    </div>
<hr/>


        <table>
                {{-- <tr>
                        <th class="text-center">#</th>

                        <th>Name</th>
                        <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Supplier</th>
                        <th class="text-right">OPTIONS</th>
                    </tr> --}}

            @foreach($caps as $cap)

            <tr>
                    <td>
                        <div class="thumbnail" >
                            <img
                            class="img-fluid img-thumbnail"
                            src="{{$cap->image}}"
                            alt="{{$cap->name}}" >
                        </div>
                    </td>
                    <td>{{$cap->name}}</td>
                    <td>{{str_limit( $cap->description,$limit = 120, $end = '...' )}}</td>
                    <td>${{$cap->price}}</td>


                    <td class="text-right">
                        <ul class="d-inline-flex">

                        <li class="list-inline-item">
                        <a class="btn btn-xs btn-primary" href="{{ route('caps.show', $cap->id) }}">
                            Detail
                        </a>
                        </li>
                        @if (!Auth::guest() && Auth::user()-> role >0)
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
                        @endif
                    </td>
            </tr>


            @endforeach
        </table>

        {{-- {!! $caps->render() !!} --}}
    @else
        <h3 class="text-center alert alert-info">Sorrt We Can Not Find Anything!</h3>
    @endif
</div>

@endsection
