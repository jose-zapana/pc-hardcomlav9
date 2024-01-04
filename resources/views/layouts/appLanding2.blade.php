<!-- appLanding -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> @yield('title') </title>

    <meta name="description" content="Pchard SAC es una empresa peruana que brinda servicios de soporte técnico y venta de ordenadores y laptops">
    <meta name="keywords" content="pchard, pc hard, pchard sac, soporte tecnico, venta de computadoras, soporte tecnico a domicilio, reparacion, accesorios de computo, suministros, impresoras">
    <meta name="author" content="José Zapana">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('landing/assets/favicon.ico')}}">


    <!-- Bootstrap -->
    <link href="{{asset('landing/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('landing/assets/ionicons-2.0.1/css/ionicons.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

@yield('styles')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- NAVBAR -->
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
                <li class="@yield('activeHome')"><a href="{{ url('/') }}">Inicio</a></li>
                <li class="@yield('activeShop')"><a href="{{ route('landing.catalog') }}">Catálogo</a></li>
                <!-- <li class="@yield('activeCategories')"><a href="#">Categorías</a></li> -->
                @auth()
                    <li class="@yield('activeOrders')"><a href="#">Pedidos</a></li>
                    <li class="@yield('activeAddress')"><a href="#">Direcciones</a></li>
                @endauth
                <li class="@yield('activeContact')"><a href="{{ route('show.contact') }}">Contacto</a></li>
            </ul>
            @guest
                <ul class="nav navbar-nav navbar-right">
                    <li class="@yield('activeLogin')"><a href="{{ route('login') }}"> <i class="ion-android-person"></i> Iniciar sesión </a></li>
                    <li class="@yield('activeRegister')"><a href="{{ route('register') }}"> Registro</a></li>
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
                    @can('access_dashboard')
                    <li>
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    @endcan
                </ul>
            @endguest
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
<hr class="offset-md">
<!-- NAVBAR -->

<!-- HEADER PAGE -->
<div class="box">
    <div class="container">
        <h1>@yield('header-page')</h1>
    </div>
</div>
<hr class="offset-md">
<!-- HEADER PAGE -->

<!-- CONTENT PAGE -->
<div id="app" class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
<br><br>
<br class="hidden-xs">
<br class="hidden-xs">
<!-- CONTENT PAGE -->

<!-- FOOTER PAGE -->
@include('layouts.themelanding.footer')
<!-- FOOTER PAGE -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('landing/assets/js/jquery-latest.min.js')}}"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('landing/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('landing/assets/js/core.js')}}"></script>
<script src="{{asset('landing/assets/js/catalog.js')}}"></script>

<script type="text/javascript" src="{{asset('landing/assets/js/jquery-ui-1.11.4.js')}}"></script>
<script type="text/javascript" src="{{asset('landing/assets/js/jquery.ui.touch-punch.js')}}"></script>
@yield('scripts')

</body>
</html>