@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class=" col-6 ">
            <div class="card">
                <div class="card-header">{{ __('Admin Management') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class=""
                            href="{{route('categories.index')}}"
                            >
                                Categories
                            </a>
                        </li>
                        <li class="list-group-item">
                                <a class=""
                                href="{{route('suppliers.index')}}"
                                >
                                    Suppliers
                                </a>
                            </li>
                        <li class="list-group-item">
                            <a class=""
                            href="{{route('caps.index')}}"
                            >
                                Caps
                            </a>
                        </li>
                        {{-- <li class="list-group-item">
                                <a class=""
                                href="{{route('orders.index')}}"
                                >
                                    Orders
                                </a>
                            </li> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
