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

    <header class="">
        <nav class="navbar navbar-dark navbar-green">
            <a href="{{ url('/ciudadano') }}" class="navbar-brand brand-link">
                <img src="{{ asset('img/logo_header.png') }}" class="brand-image-xs logo-xl" style="left: 12px">
            </a>
            <p class="navbar-text mx-auto">REGISTRO DE INSPECTORES, SUPERVISORES Y VERIFICACIONES</p>
        </nav>
    </header>

    <div class="container-fluid p-4 ">
        @section('options')
            <form id="form_inspectores" action="{{ route('ciudadano') }}" class="my-3">
                <div class="row ">
                    <div class="form-inline justify-content-center col-md-6 ">
                        <p class="mr-2 my-auto">Dependencia:</p>
                        <select id="select_dependencia" name="select_dependencia" form="form_inspectores"
                            class="form-control my-auto" onchange="selectDependencia()">
                            <option value="0" selected>
                                Todas las dependencias
                            </option>
                            @foreach ($options as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $request['select_dependencia'] ? ' selected' : '' }}>
                                    {{ $item->dependencia }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-inline col-md-6 justify-content-center mt-sm-3  mt-md-0" >
                        <input id="search" name="search" class="form-control col-6 mr-1" type="search" placeholder="Nombre del inspector"
                        value="@php echo $request['search'] ?? '' @endphp">
                        <button class="btn btn-outline-success mr-2" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <a onclick="ver()" id="btn-clean" href="{{route('ciudadano')}}" type="button" class="btn btn-light rounded-pill">
                           Ver Todos
                        </a>
                    </div>
            </form>
        </div>
    @show
    <div class="row  justify-content-center">
        @if ($count!=0)
        <div class="w-75 p-3">
            @include('usuarios.ciudadano.tabla_inspectores')
        </div>
        @else
            <h5 class="h5 mt-5">No se encontró ningun inspector</h5>
        @endif

    </div>

    </div>

    <script>
        var btnAll = document.getElementById('btn-clean');
        var selected = document.getElementById('select_dependencia');
        var search = document.getElementById('search');
        if (parseInt(selected.value) == 0 &&  search.value == ''){
            btnAll.style.visibility = 'hidden'
        }else{
            btnAll.style.visibility = 'visble'
        }
        console.log(selected.value);
        function selectDependencia() {
            console.log(event.target.value);
            location.href = "/ciudadano?select_dependencia=" + event.target.value + "&search=" + document.getElementById(
                'search').value;

        }
    </script>
    <script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>

    @yield('content_js')
</body>

</html>
