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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
</head>
<body>
<div id="app">
<header class="header" id="header">
    <nav class=" nav container ">
            <a class="nav__logo" href="{{ url('/') }}">
            <img src="../../images/logoo.png" alt="" class="nav__logo-img">
                CEMM
            </a>
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                <!-- Left Side Of Navbar -->
                <!-- <ul class="navbar-nav me-auto">

                </ul> -->

                <!-- Right Side Of Navbar -->
                <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
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
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('user.index') }}">Usuarios</a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__link" href="{{ route('diagnostic.index') }}">Diagnostico</a>
                        </li>
                        <li class="nav__item dropdown">
                            <a id="navbarDropdown" class="nav__link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Cerrar sesión
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
            </div>
    </nav>
    </header>

    <main>
        @yield('content')
    </main>
</div>
<script src="../js/main.js"></script>
<script>

    /*==================== DARK LIGHT THEME ====================*/
    const themeButton = document.getElementById('theme-button')
    const darkTheme = 'dark-theme'
    const iconTheme = 'uil-sun'
    console.log(themeButton)
    // Previously selected topic (if user selected)
    const selectedTheme = localStorage.getItem('selected-theme')
    const selectedIcon = localStorage.getItem('selected-icon')

    // We obtain the current theme that the interface has by validating the dark-theme class
    const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
    const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'uil-moon' : 'uil-sun'

    // We validate if the user previously chose a topic
    if (selectedTheme) {
        // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
        document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
        themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme)
    }

    // Activate / deactivate the theme manually with the button
    themeButton.addEventListener('click', () => {
        // Add or remove the dark / icon theme
        document.body.classList.toggle(darkTheme)
        themeButton.classList.toggle(iconTheme)
        // We save the theme and the current icon that the user chose
        localStorage.setItem('selected-theme', getCurrentTheme())
        localStorage.setItem('selected-icon', getCurrentIcon())
    })


    /*==================== DARK LIGHT THEME ====================*/
    let themeButtons = document.querySelectorAll('.theme-button2');

    themeButtons.forEach(color =>{
        color.addEventListener('click', () =>{
            let dataColor = color.getAttribute('data-color');
            document.querySelector(':root').style.setProperty('--hue-color', dataColor);
        })
    })

</script>
</body>
</html>
