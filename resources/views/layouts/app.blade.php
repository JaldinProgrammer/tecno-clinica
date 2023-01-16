<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CEMM</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->


    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="../../../css/styles.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<div id="app">
<header class="header" id="header">
    <nav class=" nav container ">
            <a class="nav__logo" href="{{ url('/') }}">
            <img src="../../images/logoo.png" alt="" class="nav__logo-img">
                CEMM
            </a>
                <!-- Right Side Of Navbar -->
                <div class="nav__menu" id="nav-menu">
                <ul class="nav__list nav__list-li">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav__item">
                                <a class="nav__link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav__item">
                                <a class="nav__link" href="{{ route('register') }}">Registrar</a>
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
                        <li class="nav__item">
                            <p class="nav__link">Buscar <i class="bx bx-chevron-down nav__arrow"></i></p>
                            <ul class="children color-switcher">
                                <li class="sub__child">
                                <form class="" method="POST" action="{{ route('search') }}">
                                @csrf
                                <div class="contact__form-div">
                                    <label for="" class="contact__form-tag2">Buscador</label>
                                    <input class="contact__form-input" name="search" type="search" placeholder="Buscador" aria-label="Search">
                                    <button class="button button_icon" type="submit"><i class='bx bx-search-alt-2 change-theme'></i></button>
                                </div>
                            </form>
                                </li>
                            </ul>
                        </li>

                            <li class="nav__item dropdown">
                                <a id="navbarDropdown" class="nav__link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Panel de administracion <i class="bx bx-chevron-down nav__arrow"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('user.index') }}">Usuarios</a>
                                    <a class="nav-link" href="{{ route('diagnostic.index') }}">Diagnostico</a>
                                    <a class="nav-link" href="{{ route('reservation.index') }}">Lista de reservaciones</a>
                                    <a class="nav-link" href="{{ route('date.index', Auth::user()->id) }}">Citas</a>
                                </div>
                            </li>

                            <li class="nav__item dropdown">
                                <a id="navbarDropdown" class="nav__link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Reportes <i class="bx bx-chevron-down nav__arrow"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="nav-link" href="{{ route('report.1') }}">Cuentas de usuario</a>
                                    <a class="nav-link" href="{{ route('report.2') }}">Llaves de cada tabla</a>
                                    <a class="nav-link" href="{{ route('report.3') }}">Reservas por mes</a>
                                    <a class="nav-link" href="{{ route('report.4') }}">Citas por semana</a>
                                    <a class="nav-link" href="{{ route('report.5') }}">Especialidades mas solicitadas</a>
{{--                                    <a class="nav-link" href="{{ route('report.5') }}">Reporte 5</a>--}}
                                </div>
                            </li>
                                <li class="nav__item dropdown">
                                    <a id="navbarDropdown" class="nav__link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Panel de control
                                        <i class="bx bx-chevron-down nav__arrow"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        @can('admin')
                                        <a class="nav-link" href="{{ route('key.create') }}">Crear llaves</a>
                                        <a class="nav-link" href="{{ route('disease.create') }}">Crear enfermedades</a>
                                        <a class="nav-link" href="{{ route('speciality.create') }}">Crear especialidad</a>
                                        <a class="nav-link" href="{{ route('promotion.create') }}">Crear promocion</a>
                                            <a class="nav-link" href="{{ route('key.index') }}">Ver llaves</a>
                                            <a class="nav-link" href="{{ route('doctorSpeciality.index') }}">Especialidades de doctores</a>
                                        @endcan

                                            <a class="nav-link" href="{{ route('disease.index') }}">Ver enfermedades</a>
                                            <a class="nav-link" href="{{ route('speciality.index') }}">Ver especialidad</a>
                                            <a class="nav-link" href="{{ route('promotion.index') }}">Ver promocion</a>
                                    </div>
                                </li>
                        @endcanany
                        <li class="nav__item dropdown">
                            <a id="navbarDropdown" class="nav__link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="bx bx-chevron-down nav__arrow"></i>
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

                        <li class="nav__item">
                            <p class="nav__link">Colores <i class="bx bx-chevron-down nav__arrow"></i></p>
                            <ul class="children color-switcher">
                                <li class="sub__child">
                                    <p class="nav2__link theme-button2" data-color="360"> Rojo </p>
                                </li>
                                <li class="sub__child">
                                    <p class="nav2__link theme-button2" data-color="236"> Azul</p>
                                </li>
                                <li class="sub__child">
                                    <p class="nav2__link theme-button2" data-color="142"> Verde</p>
                                </li>
                                <li class="sub__child">
                                    <p class="nav2__link theme-button2" data-color="340"> Rosa</p>
                                </li>
                            </ul>
                        </li>
                    @endguest

                    <div class="nav__close" id="nav-close">
                        <i class="bx bx-x"></i>
                    </div>
                </ul>
            </div>
        <div class="nav_btns">
            <i class="bx bx-moon change-theme" id="theme-button"></i>
            <div class="nav__toggle" id="nav-toggle">
                <i class="bx bx-grid-alt"></i>
            </div>
        </div>
    </nav>
    </header>

    <main class="py-4">
        <div class="section">
            @yield('content')
        </div>
    </main>
</div>

<!-- Footer -->
<footer class="footer">
            <div class="footer__container container">

                <h1 class="footer__title">Clinica Mendieta</h1>

                <div class="footer__content grid">
                    <div class="footer__data">
                        <p class="footer__description">
                            Subscribete para recibir más información
                        </p>

                        <form action="" class="footer__form" id="contact-form">
                            <input type="mail" name="mail" placeholder="Dirección de email" class="footer__input" id="contact-user">
                            <button type="submit" class="footer__button">
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </form>

                        <p class="footer__messsage" id="contact-message"></p>
                    </div>

                    <div class="footer__data">
                        <h2 class="footer__subtitle">Dirección</h2>
                        <p class="footer__information">
                            KM6 Doble vía la Guardia <br>
                            Santa Cruz, Bolivia
                        </p>
                    </div>


                    <div class="footer__data">
                        <h2 class="footer__subtitle">Horario</h2>
                        <p class="footer__information">
                            Lunes - Sabado <br>
                            8AM - 16PM
                        </p>
                    </div>
                    <span class="footer__description">Cantidad de vistas en la pagina: {{ \App\Models\Log::showViews() }}</span>
                </div>

                <div class="footer__group">
                    <ul class="footer__social">
                        <a href="#" target="_blank" class="footer__social-link">
                            <i class="bx bxl-facebook"></i>
                        </a>
                        <a href="#" target="_blank" class="footer__social-link">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </ul>

                    <span class="footer__copy">
                        &#169; Clinica Mendieta Todos los derechos reservados
                    </span>
                </div>
            </div>
        </footer>
<!-- Footer -->
<script src="../js/main.js"></script>
<script src="../js/app.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.min.js"></script>--}}
@yield('script')
</body>
</html>
