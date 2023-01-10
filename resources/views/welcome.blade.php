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
                                <h3 class="home__data-title">Clientes</h3>
                                <p class="home__data-description">Todos bien atendidos.</p>
                            </div>

                            <div class="home__data-group">
                                <h2 class="home__data-number">200</h2>
                                <h3 class="home__data-title">Aliados</h3>
                                <p class="home__data-description">vendiendo cafe asies.</p>
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
                            Todo lo que nuestra cafeteria te ofrece para ti
                        </h2>

                        <div>
                            <a href="#contact" class="button specialty__button">Comprar</a>
                        </div>
                    </div>

                    <div class="specialty__category">
                        <div class="specialty__group specialty__line">
                            <img src="./assets/img/specialty1.png" alt="" class="specialty__img">

                            <h3 class="specialty__title">Café seleccionado</h3>
                            <p class="specialty__Description">
                                Nosotros seleccionamos los mejores cafés deel mundo
                                me dieron ganas de un starbucks
                            </p>
                        </div>

                        <div class="specialty__group specialty__line">
                            <img src="./assets/img/specialty2.png" alt="" class="specialty__img">

                            <h3 class="specialty__title">Deliciosas Galletas</h3>
                            <p class="specialty__Description">
                                No encontre imagenes de galletas bonitas pero te deje algunos Croissant
                            </p>
                        </div>

                        <div class="specialty__group specialty__line">
                            <img src="./assets/img/specialty3.png" alt="" class="specialty__img">

                            <h3 class="specialty__title">Delivery hasta tu hogar</h3>
                            <p class="specialty__Description">
                                Tenemos el servicio de Delivery para que puedas disfrutarlo desde la comodidad de tu hogar.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

            <section class="products section" id="products">
                <div class="products__container container">
                    <h2 class="section__title">
                        Escoge entre nuestros Productos
                    </h2>

                    <ul class="products__filters">
                        <li class="products__item products__line active-product" data-filter=".delicacies">
                            <h3 class="products__title">Nuevas Delicias</h3>
                            <span class="products__stock">3 productos</span>
                        </li>

                        <li class="products__item products__line" data-filter=".coffee">
                            <h3 class="products__title">Cafés</h3>
                            <span class="products__stock">4 productos</span>
                        </li>

                        <li class="products__item " data-filter=".cake">
                            <h3 class="products__title">Pasteles</h3>
                            <span class="products__stock">4 productos</span>
                        </li>
                    </ul>

                    <div class="products__content grid">
                        <!-- =========== Delicacies =========== -->
                        <article class="products__card delicacies">
                            <div class="products__shape">
                                <img src="./assets/img/delicacies1.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs5</h2>
                                <h3 class="products__name">Galletas</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card delicacies">
                            <div class="products__shape">
                                <img src="./assets/img/delicacies2.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs6</h2>
                                <h3 class="products__name">Croissant</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card delicacies">
                            <div class="products__shape">
                                <img src="./assets/img/delicacies3.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs5</h2>
                                <h3 class="products__name">Croissant</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>
                        <!-- =========== Coffe =========== -->
                        <article class="products__card coffee">
                            <div class="products__shape">
                                <img src="./assets/img/coffee1.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs7</h2>
                                <h3 class="products__name">Café tinto</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card coffee">
                            <div class="products__shape">
                                <img src="./assets/img/coffee2.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs7</h2>
                                <h3 class="products__name">Café tinto</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card coffee">
                            <div class="products__shape">
                                <img src="./assets/img/coffee3.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs7</h2>
                                <h3 class="products__name">Café tinto</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card coffee">
                            <div class="products__shape">
                                <img src="./assets/img/coffee4.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs7</h2>
                                <h3 class="products__name">Café tinto</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>
                        <!-- =========== Cake =========== -->
                        <article class="products__card cake">
                            <div class="products__shape">
                                <img src="./assets/img/cake1.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs6</h2>
                                <h3 class="products__name">Pastel Glaseado</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card cake">
                            <div class="products__shape">
                                <img src="./assets/img/cake2.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs6</h2>
                                <h3 class="products__name">Pastel Glaseado</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card cake">
                            <div class="products__shape">
                                <img src="./assets/img/cake3.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs6</h2>
                                <h3 class="products__name">Pastel Glaseado</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>

                        <article class="products__card cake">
                            <div class="products__shape">
                                <img src="./assets/img/cake4.png" alt="" class="products__img">
                            </div>

                            <div class="products__data">
                                <h2 class="products__price">Bs6</h2>
                                <h3 class="products__name">Pastel Glaseado</h3>

                                <button class="button products__button">
                                    <i class="bx bx-shopping-bag"></i>
                                </button>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="quality section" id="premium">
                <div class="quality__container container">
                    <h2 class="section__title">
                        Te ofrecemos el mejor café con la mejor preparación para ti!
                    </h2>

                    <div class="quality__content grid">
                        <div class="quality__images">
                            <img src="./assets/img/quality1.png" alt="" class="quality__img-big">
                            <img src="./assets/img/quality2.png" alt="" class="quality__img-small">
                        </div>

                        <div class="quality__data">
                            <h1 class="quality__title">Café Premium</h1>
                            <h2 class="quality__price">Bs 49,99</h2>
                            <span class="quality__special">Precio especial</span>

                            <p class="quality__description">
                                No te olvides que tenes que cambiar todas las burreras que ando escribiendo pq son muchas burreras
                                ya no se que poner :)
                            </p>
                            
                            <div class="quality__buttons">
                                <button class="button">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="blog section" id="blog">
                <div class="blog__container container">
                    <h2 class="section__title">
                       Algunas notas de nuestro Blog.
                    </h2>
                    
                    <div class="blog__content grid">
                        <article class="blog__card">
                            <div class="blog__image">
                                <img src="./assets/img/blog1.png" alt="" class="blog__img">
                                <a href="#" class="blog__button">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </a>
                            </div>
                            
                            <div class="blog__data">
                                <h2 class="blog__title">
                                    Cómo tostar café
                                </h2>
                                <p class="blog__description">
                                    No te olvides que tenes que cambiar todas las burreras que ando escribiendo pq son muchas burreras
                                    ya no se que poner :)
                                </p>
                            </div>
                        </article>

                        <article class="blog__card">
                            <div class="blog__image">
                                <img src="./assets/img/blog2.png" alt="" class="blog__img">
                                <a href="#" class="blog__button">
                                    <i class="bx bx-right-arrow-alt"></i>
                                </a>
                            </div>

                            <div class="blog__data">
                                <h2 class="blog__title">
                                    Preparado de un café artesanal
                                </h2>
                                <p class="blog__description">
                                    No te olvides que tenes que cambiar todas las burreras que ando escribiendo pq son muchas burreras
                                ya no se que poner :)
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </section>
        </main>

        <script src="../js/main.js"></script>
        <script src="../js/app.js"></script>
        
    </body>
</html>
