@extends('layouts.app')

@section('content')


    <div class="container">
        <p><a href="{{ url('caps') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if (sizeof(Cart::content()) > 0)

            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th class="column-spacer"></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach (Cart::content() as $item)
                    <tr>
                        <td>
                            <a href="{{route('caps.show', $item->id)}}">
                                {{$item->name}}
                            </a>

                        </td>
                        <td>
                            {{$item->price}}
                        </td>

                        <td>

                            <ul class=" list-inline">
                                <li class="list-inline-item">
                                    <form action="{{url('carts-update')}}" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                        <input type="hidden" name="increment" value="-1">
                                        <input type="submit" class="btn btn-primary btn-sm" value="-">
                                    </form>

                                </li>

                                <li class="list-inline-item">
                                    {{$item->qty}}

                                </li>

                                <li class="list-inline-item">
                                    <form action="{{url('carts-update')}}" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                        <input type="hidden" name="increment" value="1">
                                        <input type="submit" class="btn btn-primary btn-sm" value="+">
                                    </form>

                                </li>







                            </ul>


                            {{--<select class="quantity" data-id="{{ $item->rowId }}">--}}
                                {{--<option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>--}}
                                {{--<option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>--}}
                                {{--<option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>--}}
                                {{--<option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>--}}
                                {{--<option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>--}}
                            {{--</select>--}}
                        </td>
                        <td>${{ $item->subtotal }}</td>
                        <td class=""></td>
                        <td>
                            <form action="{{route('carts.destroy',  $item->rowId)}}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>

                            {{--<form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST" class="side-by-side">--}}
                                {{--{!! csrf_field() !!}--}}
                                {{--<input type="submit" class="btn btn-success btn-sm" value="To Wishlist">--}}
                            {{--</form>--}}
                        </td>
                    </tr>

                @endforeach
                <tr>
                    <td class="table-image"></td>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: right">Subtotal</td>
                    <td>${{ Cart::instance('default')->subtotal() }}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="table-image"></td>
                    <td></td>
                    <td class="small-caps table-bg" style="text-align: right">Tax</td>
                    <td>${{ Cart::instance('default')->tax() }}</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr class="border-bottom">
                    <td class="table-image"></td>
                    <td style="padding: 40px;"></td>
                    <td class="small-caps table-bg" style="text-align: right">Your Total</td>
                    <td class="table-bg">${{ Cart::total() }}</td>
                    <td class="column-spacer"></td>
                    <td></td>
                </tr>

                </tbody>
            </table>

            <a href="{{ route('caps.index') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a href="#" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                <form action="{{ url('carts-empty') }}" method="POST">
                    {!! csrf_field() !!}
                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ route('caps.index') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->




@endsection

{{--@section('extra-js')--}}
    {{--<script>--}}
        {{--(function(){--}}
            {{--$.ajaxSetup({--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--}--}}
            {{--});--}}
            {{--$('.quantity').on('change', function() {--}}
                {{--var id = $(this).attr('data-id')--}}
                {{--$.ajax({--}}
                    {{--type: "PATCH",--}}
                    {{--url: '{{ url("/cart") }}' + '/' + id,--}}
                    {{--data: {--}}
                        {{--'quantity': this.value,--}}
                    {{--},--}}
                    {{--success: function(data) {--}}
                        {{--window.location.href = '{{ url('/cart') }}';--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        {{--})();--}}
    {{--</script>--}}
{{--@endsection--}}
