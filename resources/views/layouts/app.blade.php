<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title', '')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .btn-delete {
            background: url('/images/trash.svg');
            background-repeat: no-repeat;
            background-size: 1.1rem 1.1rem;
            padding: 0 auto 0 0;
            border: 0;
            outline: none;
        }

        .checked {
            text-decoration: line-through;
        }

        .dropdown-item {
            text-align: right !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-primary shadow-sm">
            <div class="container">
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <div class="logo">
                            <h1>{{env('APP_NAME')}}</h1>
                        </div>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('تسجيل الدخـول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('تسجيـل جديـد') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown me-auto">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    <img src="{{asset('storage/images/users/default.png')}}" alt="" class="user-image" />
                                </a>

                                <div class="dropdown-menu dropdown-menu-end text-right" aria-labelledby="navbarDropdown">
                                    <a href="/profile" class="dropdown-item">الملـف الشّـخصـي</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيـل الخـروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
