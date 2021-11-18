@extends('layouts.admin_lte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inspectores de {{ Auth::user()->dependencia->dependencia }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Inspectores</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="row">
                                <h3 class="card-title col-md-4 my-auto mb-sm-5">Listado de Inspectores</h3>
                                <div class="col-md-5">
                                    <div>
                                        <div class="form-inline col-md-12 justify-content-center mt-sm-3  mt-md-0">
                                            <input id="search" name="search" class="form-control col-6 mr-1" type="search"
                                                placeholder="Buscar inspector" value="@php echo $search ?? '' @endphp">
                                            <button class="btn btn-outline-success mr-2" onclick="search()">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <a id="btn-clean" href="{{ route('inspectores.index') }}" type="button"
                                                class="btn btn-light rounded-pill" style="visibility: hidden">
                                                Ver Todos
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-tools d-flex justify-content-end">
                                        <a class="btn btn-default" href="{{ url('/inspectores/create') }}">
                                            <i class="fa fa-plus"></i> Nuevo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="datosTabla" class="box-body table-both-scroll "></div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
    </section>
@stop

@section('content_js')

    <script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/inspectores/inspectores-list.js') }}"></script>
@stop
