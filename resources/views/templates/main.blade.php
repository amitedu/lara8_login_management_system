<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'User Management System') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Script -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            @if (Route::has('login'))
                                <div>
                                    @auth
                                        <a href="{{ url('/home') }}">Home</a>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('form-logout').submit();">logout</a>

                                        <form id="form-logout" action="{{ route('logout') }}" method="post">
                                            @csrf
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>

</html>
