@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>
                    <i class="glyphicon glyphicon-align-justify"></i> Order_Item
                    <a class="btn btn-success pull-right" href="{{ route('order__items.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
                </h1>
            </div>

            <div class="panel-body">
                @if($order__items->count())
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                
                                <th class="text-right">OPTIONS</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($order__items as $order__item)
                                <tr>
                                    <td class="text-center"><strong>{{$order__item->id}}</strong></td>

                                    



                                    <td class="text-right">
                                        <ul class="d-inline-flex">

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-primary" href="{{ route('order__items.show', $order__item->id) }}">
                                            Detail
                                        </a>
                                        </li>

                                        <li class="list-inline-item">
                                        <a class="btn btn-xs btn-warning" href="{{ route('order__items.edit', $order__item->id) }}">
                                            Edit
                                        </a>
                                        </li>

                                        <li class="list-inline-item">
                                        <form action="{{ route('order__items.destroy', $order__item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
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
                    {!! $order__items->render() !!}
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
