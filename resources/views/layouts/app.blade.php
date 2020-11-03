<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="/img/core-img/favicon.ico">

    <title>Karate League Dojo - K.L.D</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">

    @include('layouts.header')
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('img/core-img/favicon.ico')}}" alt="" height="40px" width="40px">
                    Karate League Dojo - K.L.D
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                       

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        @if (Route::has('signup'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('signup') }}">Đăng ký</a>
                        </li>
                        @endif
                        @else

                        @if(Auth::check())
                        <notification :userid='{{ auth()->id() }}' :unreads='{{ auth()->user()->unreadNotifications }}'></notification>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Đăng xuất
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

        <main class="py-4">
            @yield('content')

            <div class="toast" data-delay="5000">
                <div class="toast-header">
                    <svg class=" rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                        <rect fill="#007aff" width="100%" height="100%" /></svg>
                    <strong class="mr-auto">Bootstrap</strong>
                    <small class="text-muted">11 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
        </main>
    </div>
</body>

</html>