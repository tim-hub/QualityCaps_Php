@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-center">
        <h1>
            @if (!Auth::guest() && Auth::user()-> role >0)
            Cap
            <a class="btn btn-success pull-right" href="{{ route('caps.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
            @endif


        </h1>
    </div>



    @if($caps->count())
    <div class="row">
        <span class="col-6 col-md-4 col-lg-3">
                Name <a href="{{route('caps.index')}}?field=name">
                        Ascending
                    </a>

                    || <a href="{{route('caps.index')}}?field=name&sort=desc">
                        Descending
                    </a>

        </span>
        <span class="col-6 col-md-4 col-lg-3">
                Price <a href="{{route('caps.index')}}?field=price">
                        Ascending
                    </a>
                    || <a href="{{route('caps.index')}}?field=price&sort=desc">
                         Descending
                    </a>

        </span>
        <span class="col-6 col-md-4 col-lg-3">
                <form method='GET'  action="{{route('caps.index')}}">
                    <input type="text" name="price" value="" />
                    <input type="submit" class="btn" value="$">
                </form>

        </span>
        <span>
            <form method="GET" action="{{route('caps.index')}}">
            <select
            onchange='if(this.value != -1) { this.form.submit(); }'
            class="form-control" name="category" id="category_id-field">
                <option value=-1>
                    Category Filter
                </option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">
                    {{$category -> name}}
                </option>
                @endforeach
            </select>
            </form>
        </span>
    </div>
    <hr>


    <div class="row">
        @foreach($caps as $cap)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="thumbnail" >
                    <img
                    class="img-fluid img-thumbnail"
                    style="width: auto; height: 150px;"

                    @if (substr($cap->image, 0,5)==='https' )

                    src="{{$cap->image}}"
                    @else
                    src="{{ asset('images/caps/'.$cap->image)}}"
                    @endif
                     >

                    <div class="caption">
                        <a href="{{route('caps.show', $cap->id)}}">
                            <h3>{{$cap->name}} </h3>
                        </a>
                        <h4>
                            ${{$cap->price}}
                        </h4>
                        <p>
                            {{str_limit( $cap->description,$limit = 120, $end = '...' ) }}
                        </p>

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
                    </div>
                </div>



                {{-- <td class="text-center"><strong>{{$cap->id}}</strong></td>


                <td>{{$cap->name}}</td>
                <td>{{$cap->description}}</td>
                <td>{{$cap->price}}</td>
                <td>{{$cap->image}}</td>

                <td>{{$cap->category->name}}</td>
                <td>{{$cap->supplier->name}}</td>

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
                </td> --}}

            </div>
        @endforeach
    </div>

    {!! $caps->render() !!}
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif
</div>

@endsection
