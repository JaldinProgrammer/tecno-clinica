<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                            </li>
                        @endif
                    @else
                        @can('patient')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reservation.show', Auth::user()->id) }}">Mis reservas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('date.show', Auth::user()->id) }}">Mis citas</a>
                            </li>
                        @endcan
                        @canany(['admin','doctor'])
                            <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('search') }}">
                                @csrf
                                <button class="btn btn-sm btn-outline-success" type="submit">Search</button>
                                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            </form>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('diagnostic.index') }}">Diagnostico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reservation.index') }}">Lista de reservaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('date.index', Auth::user()->id) }}">Citas</a>
                            </li>
                             <li class="nav-item dropdown">
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Reportes
                                 </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('date.index', Auth::user()->id) }}">Reporte 1</a>
                                    <a class="nav-link" href="{{ route('date.index', Auth::user()->id) }}">Reporte 2</a>
                                    <a class="nav-link" href="{{ route('date.index', Auth::user()->id) }}">Reporte 3</a>
                                 </div>
                             </li>
                        @endcanany
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
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
        @yield('content')
    </main>
</div>
@yield('js')
@extends('layouts.footer')
</body>
</html>
