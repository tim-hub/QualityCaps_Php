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

            {{-- {!! Form::select('category',
            ['-1'=>'Select Gender',
            '0'=>'Men','1'=>'Female', '2'=>'Kids'],
            null,
            ['class'=>'form-control','onChange'=>'form.submit()'])
            !!} --}}





            {{-- {!! Form::open(['method'=>'get']) !!}

            <div class="col-sm-5 form-group">
                <div class="input-group">
                    <input class="form-control" id="search"
                            value="{{ request('search') }}"
                            placeholder="Search name" name="search"
                            type="text" id="search"/>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-warning"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </div>


            <input type="hidden" value="{{request('field')}}" name="field"/>
            <input type="hidden" value="{{request('sort')}}" name="sort"/>
            {!! Form::close() !!} --}}

                        <tr>
                            <th class="text-center">#</th>

                            <th>Name</th>
                            <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Supplier</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>



    </div>



        <div class="row">
            @foreach($caps as $cap)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="thumbnail" >
                        <img
                        class="img-fluid img-thumbnail"
                        style="width: auto; height: 150px;"
                        src="{{$cap->image}}"
                        alt="{{$cap->name}}" >
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
