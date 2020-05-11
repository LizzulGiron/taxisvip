<!DOCTYPE html>
<html class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Meghna One page parallax responsive HTML Template ">
    <meta name="author" content="Muhammad Morshed">
    <title>Taxis VIP</title>
    <link rel="icon"  type="image/png" href="{{ asset('assets/images/icono.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/vendor/themefisher-font/style.css">
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/animate-css/animate.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="50">   
     <header id="navigation" class="navigation navbar-dark">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                @if (Route::has('login'))
                    <ul id="nav" class="nav navbar-nav navigation-menu">
                        @auth
                            <li>
                                <a data-scroll href="#about">
                                    <b>Sobre nosotros</b>
                                </a>
                            </li>
                            <li>
                                <a data-scroll href="#services">
                                    <b>Servicios</b>
                                </a>
                            </li>
                            <li>
                                <a data-scroll href="{{ url('/home') }}">
                                    <b>Tablero</b>
                                </a>
                            </li>
                        @else
                            <li>
                                <a data-scroll href="#about">
                                    <b>Sobre nosotros</b>
                                </a>
                            </li>
                            <li>
                                <a data-scroll href="#services">
                                    <b>Servicios</b>
                                </a>
                            </li>
                            <li>
                                <a data-scroll href="{{ route('login') }}">
                                    <b>Iniciar Sesión</b>
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                    <a data-scroll href="{{ route('register') }}">
                                        <b>Registrarse</b>
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </nav>
        </div>
    </header>

    <section class="hero-area overlay" style="background-image: url('assets/images/background2.jpg');">
        <div class="block">
            <h1>Haz tús actividades con nosotros!</h1>
            <p>Te ofrecemos una manera rápida y sencilla de realizar tús operaciones diarias. Con tan solo un click comienza hoy a trabajar!</p>
            <a data-scroll href="{{ route('login') }}" class="btn btn-transparent">Iniciar</a>
        </div>
    </section>

    <section class="bg-one about section" id="about">
        <div class="container">
            <div class="row">
                <div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
                    <h2 style="color: #000">Sobre <span class="color">Nosotros</span> </h2>
                    <div class="border"></div>
                </div>

                <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" >
                    <div class="block">                         
                        <div class="icon-box">
                            <i class="tf-tools"></i>
                        </div>
                        <div class="content text-center">
                            <h3 class="ddd">Diseño amigable</h3>                             
                            <p>Ponemos a disposición de los usuarios un sistema amigable para realizar sus tareas diarias de forma sencilla y éficaz.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms">
                    <div class="block">
                        <div class="icon-box">
                            <i class="tf-strategy"></i>
                        </div>
                            <!-- Express About Yourself -->
                        <div class="content text-center">
                            <h3>Profesionales en lo que hacemos</h3>
                            <p>Nuestra aplicación garantiza que todas las operaciones se realizarán con un nivel de seguridad alto, asegurando la confiabilidad de las operaciones.</p>
                        </div>
                    </div>
                </div> 

                <div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
                    <div class="block kill-margin-bottom">
                        <div class="icon-box">
                            <i class="tf-anchor2"></i>
                        </div>
                            <!-- Express About Yourself -->
                        <div class="content text-center">
                            <h3>Registro automátizado</h3>
                            <p>Registre los servicios de su negocio y automatice sús tareas, aumentando sus ganancias en el menor tiempo posible.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="call-to-action section-sm bg-1 overly">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Gran diseño y funcionalidad increíble</h2>
                    <p>Nuestro sistema es una herramienta útil y sencilla que te proporciona una nueva opción para realizar tús tareas diarias .</p>
                    <a href="{{ route('login') }}" class="btn btn-warning" style="padding-left: 60px;padding-right: 60px">
                        <b>INICIA AHORA</b>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-one section">
        <div class="container">
            <div class="row">
                <div class="title text-center wow fadeIn" data-wow-duration="500ms">
                    <h2 style="color: #000">Nuestros <span class="color">Servicios</span></h2>
                    <div class="border"></div>
                </div>
                <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
                    <div class="service-block text-center">
                        <div class="service-icon text-center">
                            <i class="tf-globe"></i>
                        </div>
                        <h3>Registro éficaz</h3>
                        <p>Los formularios de registro le ayudan a ingresar la información correspondiente tanto de sus clientes como de los colaboradores.</p>
                    </div>
                </article>
                <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
                    <div class="service-block text-center">
                        <div class="service-icon text-center">
                            <i class="tf-ion-laptop"></i>
                        </div>
                        <h3>Servicio 24/7</h3>
                        <p>Le ponemos a su disposición una herramienta sencilla, con una funcionalidad de tiempo completo, asegurando disponibilidad en tiempo real.</p>
                    </div>
                </article>
                <article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="200ms">
                    <div class="service-block text-center">
                        <div class="service-icon text-center">
                            <i class="tf-dial"></i>
                        </div>
                        <h3>Módulo de Pago</h3>
                        <p>Con esta funcionalidad podrás mantenerte al tanto de los cobros de cada uno de sus colaboradores, manejando los pagos de la forma mas segura.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/vendor/slick-carousel/slick/slick.min.js"></script>
    <script type="text/javascript" src="assets/vendor/filterzr/jquery.filterizr.min.js"></script>
    <script type="text/javascript" src="assets/vendor/smooth-scroll/dist/js/smooth-scroll.min.js"></script>
    <script type="text/javascript" src="assets/vendor/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="assets/vendor/Sticky/jquery.sticky.js"></script>
    <script type="text/javascript" src="assets/vendor/wow/dist/wow.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>