<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMAC</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="{{ asset('css/fonts_google.css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <link href="{{ asset('css/innovacion.tuxtla.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">

    @yield('content_css')
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.png') }}">

</head>

<body>

    @section('header')
        <header class="">
            <nav class="navbar navbar-dark navbar-green">
                <a href="{{ url('/ciudadano') }}" class="navbar-brand brand-link">
                    <img src="{{ asset('img/logo_header.png') }}" class="brand-image-xs logo-xl" style="left: 12px">
                </a>
                <p class="navbar-text mx-auto">REGISTRO DE INSPECTORES, SUPERVISORES Y VERIFICACIONES</p>
            </nav>
        </header>
    @show

    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>

    @yield('content_js')
</body>

</html>
