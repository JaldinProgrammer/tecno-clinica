<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CEMM</title>
        <link rel="shortcut icon" href="../images/logoo.png" type="image/x-icon">

        <link rel="stylesheet" href="../css/styles.css">

        
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">

    <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <img src="../images/logoo.png" alt="" class="nav__logo-img">
                    CEMM
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Inicio</a>
                        </li>

                        <li class="nav__item">
                            <a href="#specialty" class="nav__link">Ofrecemos</a>
                        </li>

                        
                        <li class="nav__item">
                            <a href="#premium" class="nav__link">Especial</a>
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
                        @if (Route::has('login'))
                            @auth
                        <li class="nav__item">
                                    <a href="{{ url('/home') }}" class="nav__link">Inicio</a>
                        </li>
                                @else
                        <li class="nav__item">
                            <a href="{{ route('login') }}" class="nav__link">Ingresar</a>
                        </li>
            
                                    @if (Route::has('register'))
                        <li class="nav__item">
                            <a href="{{ route('register') }}" class="nav__link">Registrarse</a>
                        </li>
                                    @endif
                                @endauth
                        @endif
                        
                    <div class="nav__close" id="nav-close">
                        <i class="bx bx-x"></i>
                    </div>
                </div>


                <div class="nav_btns">
                    <i class="bx bx-moon change-theme" id="theme-button"></i>
                    <div class="nav__toggle" id="nav-toggle">
                        <i class="bx bx-grid-alt"></i>
                    </div>
                </div>

                
            </nav>
        </header>

        <main>
            <section class="home grid" id="home">
                <div class="home__container">
                    <div class="home__content container">
                        <h1 class="home__title">
                            Centro de Especialidades Medicas Mendieta<span>.</span>
                        </h1>
                        <p class="home__description">
                            ¡Pensando en tu salud!
                        </p>

                        <div class="home__data">
                            <div class="home__data-group">
                                <h2 class="home__data-number">+1200</h2>
                                <h3 class="home__data-title">Atenciones</h3>
                                <p class="home__data-description">En Consulta Externa.</p>
                            </div>

                            <div class="home__data-group">
                                <h2 class="home__data-number">326</h2>
                                <h3 class="home__data-title">Hospitalizaciones</h3>
                                <p class="home__data-description">Atendidas.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <img src="../images/bruno-rodrigues-279xIHymPYY-unsplash.jpg" alt="" class="home__img">
            </section>

            <section class="specialty section" id="specialty">
            <div class="specialty section container" id="specialty">
                <div class="specialty__container">
                    <div class="specialty__box">
                        <h2 class="section__title">
                            Todo lo que nuestra Clinica puede ofrecerte
                        </h2>
                    </div>

                    <div class="specialty__category">
                        <div class="specialty__group specialty__line">
                            <img src="../images/268.png" alt="" class="specialty__img">

                            <h3 class="specialty__title">Café seleccionado</h3>
                            <p class="specialty__Description">
                                Nosotros seleccionamos los mejores cafés deel mundo
                                me dieron ganas de un starbucks
                            </p>
                        </div>

                        <div class="specialty__group specialty__line">
                            <img src="../images/20.png" alt="" class="specialty__img">

                            <h3 class="specialty__title">Deliciosas Galletas</h3>
                            <p class="specialty__Description">
                                No encontre imagenes de galletas bonitas pero te deje algunos Croissant
                            </p>
                        </div>

                        <div class="specialty__group specialty__line">
                            <img src="../images/12.png" alt="" class="specialty__img">

                            <h3 class="specialty__title">Delivery hasta tu hogar</h3>
                            <p class="specialty__Description">
                                Tenemos el servicio de Delivery para que puedas disfrutarlo desde la comodidad de tu hogar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            <section class="quality section" id="premium">
                <div class="quality__container container">
                    <h2 class="section__title">
                        Nuestra misión
                    </h2>

                    <div class="quality__content grid">
                        <div class="quality__images">
                            <img src="../images/cdc2.jpg" alt="" class="quality__img-big">
<!--                             <img src="../images/us.jpg" alt="" class="quality__img-small"> -->
                        </div>

                        <div class="quality__data">
                            <h1 class="quality__title">Misión</h1>

                            <p class="quality__description">
                            Satisfacer de manera eficaz y eficiente las necesidades de cuidado de salud de la comunidad. <br>
                            Brindar a toda la comunidad la mejor atención medica basada en la evidencia científica y contenido ético, acompañando al paciente y su familia.
                            Colaborar con la Educación del paciente, su familia y la sociedad, brindando cuidado y promoción de actitudes saludables.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        <footer class="footer">
            <div class="footer__container container">
                
                <h1 class="footer__title">Clinica Mendieta</h1>

                <div class="footer__content grid">
                    <div class="footer__data">
                        <p class="footer__description">
                            Subscribete para recibir más información
                        </p>

                        <div class="footer__newsletter">
                            <input type="email" placeholder="Dirección de email" class="footer__input">
                            <button class="footer__button">
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
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


        <a href="#" class="scrollup" id="scroll-up">
            <i class="bx bx-up-arrow-alt"></i>
        </a>

        <script src="../js/main.js"></script>
        <script src="../js/app.js"></script>
        
    </body>
</html>
