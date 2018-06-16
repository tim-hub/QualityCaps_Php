<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a href="{{ url('/')}}"
        class="navbar-brand">
            <img
            class="img-rounded"
            style="
                max-width:50px;
                margin-top: -0.4em;
            "
            src="{{ asset('images/logo.png')}}" />
        </a>
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-link" href="{{ route('caps.index') }}">{{ __('Products') }}</a></li>
                <li><a class="nav-link" href="{{ url('/about') }}">{{ __('About') }}</a></li>
                <li><a class="nav-link" href="{{ url('/contact')  }}">{{ __('Contact') }}</a></li>

                @if (!Auth::guest() && Auth::user()-> role >0)
                <li><a class="nav-link" href="{{ route('admin')  }}">{{ __('Admin') }}</a></li>

                @endif

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <form class="form-group"
                    style="margin-top: 0.2em;"
                    method="get"
                    action="{{route('search')}}">

                        <input style="max-width:80px; "type="text" name="q">
                        <input type="submit" class="btn" value="Search">

                    </form>


                </li>


                <!-- Authentication Links -->
                @guest
                    <li> <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li> <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{route('users.show', Auth::user()->id)}}">
                                Profile
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
