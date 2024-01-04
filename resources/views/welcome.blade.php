<!-- Welcome -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Pc Hard | Pchard SAC </title>

    <meta name="description" content="Pchard SAC es una empresa peruana que brinda servicios de soporte técnico y venta de ordenadores y laptops">
    <meta name="keywords" content="pchard, pc hard, pchard sac, soporte tecnico, venta de computadoras, soporte tecnico a domicilio, reparacion, accesorios de computo, suministros, impresoras">
    <meta name="author" content="José Zapana">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('landing/assets/favicon.ico')}}">


    <!-- Bootstrap -->
    <link href="{{asset('landing/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/carousel.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/carousel-recommendation.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/ionicons-2.0.1/css/ionicons.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"> <i class="ion-cube"></i> Pc-Hard</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ route('landing.catalog') }}">Catálogo</a></li>
                <!-- <li><a href="#">Categorías</a></li> -->
                @auth()
                    <li><a href="#">Pedidos</a></li>
                    <li><a href="#">Direcciones</a></li>
                @endauth
                <li><a href="{{ route('show.contact') }}">Contacto</a></li>
            </ul>
            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ route('login') }}"> <i class="ion-android-person"></i> Iniciar Sesión </a></li>
                    <li><a href="{{ route('register') }}"> Registro</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"> {{ Auth::user()->name }} </a></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                            {{ __('Cerrar Sesión') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <!-- Este link nos regresa al home (parte interna del sistema) -->
                    <li><a href="{{ route('home') }}">
                            Mi cuenta
                        </a></li>
                </ul>
            @endguest
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>


<header>
    <div class="carousel" data-count="3" data-current="2">
        <!-- <button class="btn btn-control"></button> -->

        <div class="items">
            <div class="item" data-marker="1">
                <img src="{{asset('landing/assets/img/carousel/bckg.jpg')}}" alt="Background" class="background"/>

                <div class="content">
                    <div class="outside-content">
                        <div class="inside-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 align-center">
                                        <h1>Servicio Técnico a Domicilio</h1>
                                        <p>Computadoras y Laptops</p>
                                        <a href="#">Contactanos ></a>
                                        <br><br>
                                    </div>
                                    <div class="col-sm-6 col-sm-offset-3 align-center">
                                        <img src="{{asset('landing/assets/img/carousel/soporte.png')}}" alt="Soporte Técnico Pc"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item active" data-marker="2">
                <img src="{{asset('landing/assets/img/carousel/bckg.jpg')}}" alt="Background" class="background"/>

                <div class="content">
                    <div class="outside-content">
                        <div class="inside-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2 align-center">
                                        <img src="{{asset('landing/assets/img/carousel/pc-hard-cases.png')}}" alt="Pc-HARD-Cases"/>
                                    </div>
                                    <div class="col-sm-12 align-center">
                                        <h1>Arma tu PC</h1>
                                        <p>Diseña tu Pc con Pc-Hard</p>
                                        <a href="#">Contactanos ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item" data-marker="3">
                <img src="{{asset('landing/assets/img/carousel/bckg.jpg')}}" alt="Background" class="background"/>

                <div class="content">
                    <div class="outside-content">
                        <div class="inside-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-5 col-sm-offset-1 align-center">
                                        <img src="{{asset('landing/assets/img/carousel/pchard1.png')}}" alt="iPad Air 2" class="hidden-xs hidden-sm"/>
                                        <img src="{{asset('landing/assets/img/carousel/pchard1m.png')}}" alt="iPad Air 2" class="hidden-md hidden-lg"/>
                                    </div>
                                    <div class="col-sm-4 align-left">
                                        <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                                        <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                                        <h1>Personaliza tu equipo</h1>
                                        <br>

                                        <p>
                                            A tus necesidades.
                                        </p>
                                        <a href="#">Contactanos ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <ul class="markers">
            <li data-marker="1"><img src="{{asset('landing/assets/img/carousel/soporte.png')}}" alt="Background"/></li>
            <li data-marker="2" class="active"><img src="{{asset('landing/assets/img/carousel/pc-hard-cases.png')}}" alt="Background"/></li>
            <li data-marker="3"><img src="{{asset('landing/assets/img/carousel/pchard1.png')}}" alt="Background"/></li>
        </ul>
    </div>
</header>
<br><br>

<div class="container">
    <div class="row">
        <div class="col-sm-3 align-center">
            <a href="https://www.pc-hard.com/blog/">
                <img src="{{ asset('landing/assets/img/tiles/blog.jpg') }}" alt="Blog" class="image"/>
            </a>
            <br><br>

            <a href="https://www.pc-hard.com/blog/">Nuestro blog</a>
        </div>
        <div class="col-sm-3 align-center">
            <a href="#video" data-gallery="#video" data-source="vimeo" data-id="110691368" data-id="110691368" data-title="Apple iPad Air" data-description="So capable, you won’t want to put it down. So thin and light, you won’t have to.">
                <img src="{{ asset('landing/assets/img/tiles/video-apple.jpg') }}" alt="New devices" class="image"/>
            </a>
            <br><br>

            <a href="#video" data-gallery="#video" data-source="vimeo" data-id="110691368" data-title="Apple iPad Air" data-description="So capable, you won’t want to put it down. So thin and light, you won’t have to.">Nuevo apple diveces</a>
        </div>
        <div class="col-sm-3 align-center">
            <a href="#video" data-gallery="#video" data-source="youtube" data-id="6g-ZIm0wge4" data-title="Best New Dell Laptops" data-description="Best of dell's laptops that you can consider buying in 2016. 4 Laptops are featured in the video and all of them has equal importance and there is no order that #1 is better than #2">
                <img src="{{ asset('landing/assets/img/tiles/video-dell.jpg') }}" alt="Del XPS" class="image"/>
            </a>
            <br><br>

            <a href="#video" data-gallery="#video" data-source="youtube" data-id="6g-ZIm0wge4" data-title="Best New Dell Laptops" data-description="Best of dell's laptops that you can consider buying in 2016. 4 Laptops are featured in the video and all of them has equal importance and there is no order that #1 is better than #2">Brend new DELL XPS</a>
        </div>
        <div class="col-sm-3 align-center">
            <a href="{{ route('landing.catalog') }}">
                <img src="{{ asset('landing/assets/img/tiles/gallery.jpg') }}" alt="Gallery" class="image"/>
            </a>
            <br><br>

            <a href="{{ route('landing.catalog') }}">Catálogo de productos</a>
        </div>
    </div>
</div>
<br><br>

@include('layouts.themelanding.footer')

<!-- Modal -->
<div class="modal fade" id="Modal-ForgotPassword" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="modal-title">¿Olvidaste tu contraseña?</h4> 
                            <br>

                            <form class="join" action="#" method="post">
                                <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                                <br>

                                <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                                <a href="#Sign-In" data-action="Sign-In">Back ></a>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <br><br>
                            <p>
                                Ingrese la dirección de correo electrónico asociada con su cuenta. Haga clic en enviar para recibir su contraseña por correo electrónico.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modal-Gallery" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('landing/assets/js/jquery-latest.min.js') }}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('landing/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('landing/assets/js/core.js') }}"></script>
<script src="{{ asset('landing/assets/js/carousel.js') }}"></script>
<script src="{{ asset('landing/assets/js/carousel-recommendation.js') }}"></script>

</body>
</html>