<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('landing/assets/favicon.png') }}" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('intranet/assets/font-awesome/4.5.0/css/font-awesome.min.css') }} " />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{{ asset('toast/jquery.toast.min.css') }}">
    @yield('styles')

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/fonts.googleapis.com.css') }} " />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace.min.css') }} " class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-part2.min.css') }} " class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-skins.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-rtl.min.css') }} " />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-ie.min.css') }} " />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('intranet/assets/js/ace-extra.min.js') }} "></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('intranet/assets/js/html5shiv.min.js') }} "></script>
    <script src="{{ asset('intranet/assets/js/respond.min.js') }} "></script>
    <![endif]-->

    @livewireStyles
</head>