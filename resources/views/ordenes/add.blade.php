@extends('layouts.admin_lte')
@section('content_css')
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/draggable.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">

@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nueva Orden</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/ordenes') }}">Ordenes</a></li>
                        <li class="breadcrumb-item active">Nuevo</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="container-fliud">
                                                {{-- <div class="card-header">
                                                    <h3 class="card-title">Datos del inspector</h3>

                                                </div> --}}
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <nav class="row col-12">
                                                        <div class="col-md-12 ">
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-link active " id="nav-inspector-tab"
                                                                    data-toggle="tab" href="#nav-inspector" role="tab"
                                                                    aria-controls="nav-inspector" aria-selected="true">
                                                                    Orden de inspección
                                                                </a>
                                                                <a class="nav-link" id="nav-fudamentos-tab"
                                                                    data-toggle="tab" href="#nav-fudamentos" role="tab"
                                                                    aria-controls="nav-fudamentos" aria-selected="false">
                                                                    Fundamentos Jurídicos
                                                                </a>
                                                                <a class="nav-link" id="nav-documentacion-tab"
                                                                    data-toggle="tab" href="#nav-documentacion" role="tab"
                                                                    aria-controls="nav-documentacion" aria-selected="false">
                                                                    Documentación
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-inspector"
                                                            role="tabpanel" aria-labelledby="nav-inspector-tab">
                                                            @include('ordenes.add-orden')</div>
                                                        <div class="tab-pane fade" id="nav-fudamentos" role="tabpanel"
                                                            aria-labelledby="nav-fudamentos-tab">
                                                            @include('ordenes.add-fundamentos')
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-documentacion" role="tabpanel"
                                                        aria-labelledby="nav-documentacion-tab">
                                                        @include('ordenes.add-documentos')
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
@section('content_js')
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>
@stop
