@extends('layouts.admin_lte')
@section('content_css')
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Dependencia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/dependencias') }}">Dependencias</a></li>
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
                        <div class="card-header">
                            <h3 class="card-title">Datos de la dependecia</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form role="form" id="form" name="form">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="row col-md-9 mx-auto p-0">
                                            <div class="col-md-8">
                                                <div class="form-group has-feedback">
                                                    <label>Nombre de dependencia</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        aria-required="true" aria-describedby="url-error"
                                                        aria-invalid="true" placeholder="Nombre de dependencia"
                                                        value="@php echo $dependencia->dependencia @endphp" required>
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label>Depende de: </label>
                                                    <select class="form-control select2" id="dependencia_id"
                                                        name="dependencia_id" form="form">
                                                        <option value="0" selected>Ninguno</option>
                                                        @foreach ($dependencia_items as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $dependencia->parent_id ? ' selected' : '' }}>
                                                                {{ $item->dependencia }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-9 mx-auto">
                                            <div class="form-group has-feedback">
                                                <label>Responsable</label>
                                                <input type="text" class="form-control" id="responsable"
                                                    name="responsable" aria-required="true" aria-describedby="url-error"
                                                    aria-invalid="true" placeholder="Nombre completo del Resposable"
                                                    value="@php echo $dependencia->responsable @endphp" required>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-9 mx-auto">
                                            <div class="form-group has-feedback">
                                                <label>Dirreción</label>
                                                <input type="text" class="form-control" id="dirreccion" name="direccion"
                                                    aria-required="true" aria-describedby="url-error" aria-invalid="true"
                                                    placeholder="Dirreción de la dependencia" value="@php echo $dependencia->direccion @endphp"
                                                    required>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-9 mx-auto">
                                            <div class="form-group has-feedback">
                                                <label>Correo</label>
                                                <input type="mail" class="form-control" id="correo" name="correo"
                                                    aria-required="true" aria-describedby="url-error" aria-invalid="true"
                                                    placeholder="nombre@dependencia.com" value="@php echo $dependencia->email @endphp" required>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="row mx-auto">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Teléfono</label>
                                                    <input class="form-control" type="text" id="telefono" name="telefono"
                                                        placeholder="9611231111" value="@php echo $dependencia->telefono @endphp" required>
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label>Extencion</label>
                                                    <input class="form-control" type="tel" id="tel_oficina" name="ext"
                                                        placeholder="111" value="@php echo $dependencia->ext @endphp">
                                                    <span
                                                        class="glyphicon glyphicon-phone-alt  form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="box-footer text-center">
                                    <input type="hidden" name="id_registro" id="id_registro" value="@php echo $dependencia->id @endphp">
                                    <button type="button" onclick="window.location.href='{{ url('/dependencias') }}'"
                                        class="btn btn-default mr-5">Cancelar</button>
                                    <button type="submit" id="btnSave" name="btnSave"
                                        class="btn btn-info pull-right">Guardar</button>
                                </div><!-- /.box-footer -->
                            </form>
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
    <script src="{{asset('js/dependencias/dependencia-edit.js')}}"></script>
    <script>
        $(function () {
          //Initialize Select2 Elements
          $(".select2").select2();
        });
    </script>
@stop
