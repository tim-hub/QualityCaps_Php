<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

</head>
<body>

    <div id="app">

        @include('layouts.header')


        <main class="py-4">
            @yield('content')
        </main>


        <hr>

        @include('layouts.footer')

        @if(Auth::guest() || Auth::user() -> role <9)
            <form action="{{ route('carts.index') }}" method="GET">
                <button
                    type="submit"
                    style="
                    position:fixed;
                    width:160px;
                    height:60px;
                    bottom:100px;
                    right:40px;
                    background-color:#0C9;
                    color:#FFF;
                    border-radius:50px;
                    text-align:center;
                    box-shadow: 2px 2px 3px #999;
                    margin-top:22px;
                    "
                    class=" btn btn-lg btn-successful"
                >
                    {{ __('Shopping Cart') }}
                </button>
            </form>
        @endif
    </div>
</body>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
</html>
