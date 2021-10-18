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
        <nav class="navbar navbar-dark navbar-red">
            <a href="{{ url('/ciudadano') }}" class="navbar-brand brand-link">
                <img src="{{ asset('img/logo_header.png') }}" class="brand-image-xs logo-xl" style="left: 12px">
            </a>
            <p class="navbar-text mx-auto">REGISTRO DE INSPECTORES, SUPERVISORES Y VERIFICACIONES</p>
        </nav>
    </header>
    <section class="container-fluid  justify-content-center p-5">
        <div class="form-inline">
            <section class="row col-12 py-auto mb-4">
                <div class="form-group justify-content-center col-6 my-auto">
                    <p class="mr-2 my-auto">Dependencia:</p>
                    <select id="select_dependencia" name="select_dependencia" form="form_inspectores"
                        class="form-control my-2" onchange="selectDependencia()">
                        <option value="0" selected>
                            Todas las dependencias
                        </option>
                        @foreach ($options as $item)
                            <option value={{ $item->id }} >
                                {{ $item->dependencia }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <form class="col-6 d-flex my-auto justify-content-end" action="{{ route('ciudadano.searchInspector') }}" method="GET">
                    <div class="mr-2 my-2">
                        <input class="form-control @error('nameInspector') is-invalid @enderror" type="search"
                            placeholder="Nombre del inspector">
                        @error('nameInspector')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="py-2">
                        <button class="btn btn-outline-success"  type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </section>
            <section class="row col-12">
                <div class="col-6">
                    @include('components.table_inspectores')
                </div>
                <div id="ver-inspector" class="col-6">
                    @include('components.view_inspector')
                </div>
            </section>
        </div>
    </section>
    <script>
        function verInspector(id) {
            console.log(id)
            fetch("/ciudadano/inspector/" + id)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('ver-inspector').innerHTML = html;
                });
        }

        function selectDependencia() {
            console.log(event.target.value);
            fetch("/ciudadano/selectDependencia/" + event.target.value)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('table-inspectores').innerHTML = html;
                });
        }
    </script>
    <script src="{{ asset('js/innovacion.tuxtla.js') }}"></script>
    @yield('content_js')
</body>

</html>