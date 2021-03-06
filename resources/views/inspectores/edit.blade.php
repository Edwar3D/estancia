@extends('layouts.admin_lte')
@section('content_css')
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/draggable.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Inspector</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/inspectores') }}">Inspectores</a></li>
                        <li class="breadcrumb-item active">Editar</li>
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
                                              {{--   <div class="card-header">
                                                    <h3 class="card-title">Datos del inspector</h3>

                                                </div> --}}
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <nav class="row col-12">
                                                        <div class="col-md-12 ">
                                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                                <a class="nav-link active " id="nav-inspector-tab" data-toggle="tab" href="#nav-inspector"
                                                                    role="tab" aria-controls="nav-inspector" aria-selected="true">
                                                                    Datos del inspector
                                                                </a>
                                                                <a class="nav-link" id="nav-fudamentos-tab" data-toggle="tab" href="#nav-fudamentos"
                                                                    role="tab" aria-controls="nav-fudamentos" aria-selected="false">
                                                                    Fundamentos Jur??dicos
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </nav>
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-inspector" role="tabpanel"
                                                            aria-labelledby="nav-inspector-tab">
                                                        @include('inspectores.data.edit-inspector')</div>
                                                        <div class="tab-pane fade" id="nav-fudamentos" role="tabpanel"
                                                            aria-labelledby="nav-fudamentos-tab">
                                                            @include('inspectores.data.edit-fundamentos')
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
