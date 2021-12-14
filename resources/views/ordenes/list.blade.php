@extends('layouts.admin_lte')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ordenes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Ordenes</li>
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
                <h3 class="card-title">Listado de Ordenes</h3>

                <div class="card-tools">
                <a class="btn btn-default" href="{{ url('/ordenes/create') }}"><i class="fa fa-plus"></i> Nuevo</a>
                </div>
              </div>
              <div class="card-body">
                <div id="datosTabla" class="box-body table-both-scroll"></div>
              </div>

            </div>
          <div>
        </div>
      </div>
    </section>
@stop

@section('content_js')
<script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('js/ordenes/ordenes-list.js') }}"></script>
@stop
