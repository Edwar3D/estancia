@extends('layouts.admin_lte')
@section('content_css')
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Nuevo</h1> --}}
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
                            <nav class="row col-12">
                                <div class="col-md-10 col-sm-9">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active " id="nav-inspector-tab" data-toggle="tab" href="#nav-inspector"
                                            role="tab" aria-controls="nav-inspector" aria-selected="true">
                                            Datos del inspector
                                        </a>
                                        <a class="nav-link" id="nav-dependencia-tab" data-toggle="tab" href="#nav-dependencia"
                                            role="tab" aria-controls="nav-dependencia" aria-selected="false">
                                            Datos de la dependencia
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 text-right">
                                <a class="btn btn-secondary  btn-sm" href="javascript:history.back()">
                                    <i class="fas fa-arrow-circle-left d-inline"></i>
                                    <span class="d-inline">Regresar</span>
                                </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-inspector" role="tabpanel"
                                    aria-labelledby="nav-inspector-tab">
                                @include('inspectores.data.edit-inspector')</div>
                                <div class="tab-pane fade" id="nav-dependencia" role="tabpanel"
                                    aria-labelledby="nav-dependencia-tab">
                                    @include('inspectores.data.edit-dependencia')
                                </div>
                            </div>

                        </div>
                        <div>
                        </div>
                    </div>
    </section>
@stop
@section('content_js')
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2().val("");
            $("#subdependencia_id").select2().val("");
        });
    </script>
@stop
