@extends('layouts.admin_lte')
@section('content_css')
    <link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Nuevo</h1>
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
                                                <div class="card-header">
                                                    <h3 class="card-title">Datos del inspector</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <form role="form" id="form1" name="form1">
                                                        <div class="box-body">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="row col-12">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Numero de empleado:</label>
                                                                                <input type="text"
                                                                                    class="form-control" id="numero_empleado"
                                                                                    name="numero_empleado" aria-required="true"
                                                                                    aria-describedby="url-error"
                                                                                    aria-invalid="true"
                                                                                    placeholder="12345678">
                                                                                <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Nombre:</label><input type="text"
                                                                                    class="form-control" id="nombre"
                                                                                    name="nombre" aria-required="true"
                                                                                    aria-describedby="url-error"
                                                                                    aria-invalid="true"
                                                                                    placeholder="Nombre">
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Apellidos:</label><input
                                                                                    class="form-control" type="text"
                                                                                    id="apellidos" name="apellidos"
                                                                                    placeholder="Apellidos">
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row my-3 form-group has-feedback">
                                                                        <h5 class="col-12">Cargo:</h5>
                                                                        <div class="container text-center mb-2">
                                                                            @foreach ($cargos as $cargo)
                                                                                <div
                                                                                    class="custom-control custom-radio custom-control-inline">
                                                                                    <input type="radio"
                                                                                        id="customRadioInline{{ $cargo->id }}"
                                                                                        value="{{ $cargo->id }}"
                                                                                        name="cargo"
                                                                                        class="custom-control-input">
                                                                                    <label class="custom-control-label"
                                                                                        for="customRadioInline{{ $cargo->id }}">{{ $cargo->cargo }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <span
                                                                            class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Area administrativa:</label>
                                                                                <select class="form-control select2"
                                                                                    style="width: 100%;" id="area_administrativa"
                                                                                    name="area_administrativa">

                                                                                    @foreach ($subdependencias as $item)
                                                                                        <option value="{{ $item->id }}">
                                                                                            {{ $item->dependencia }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Jefe Indemediato:</label><input
                                                                                    class="form-control" type="text"
                                                                                    id="jefe" name="jefe"
                                                                                    placeholder="Nombre completo">
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Correo Institucional:</label><input
                                                                                    class="form-control" type="text"
                                                                                    id="correo" name="correo"
                                                                                    placeholder="correo@dependencia.com">
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group has-feedback">
                                                                                <label>Teléfono:</label><input
                                                                                    class="form-control" type="text"
                                                                                    id="telefono" name="telefono"
                                                                                    placeholder="9611231234">
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group has-feedback">
                                                                                {{-- <label>Ext</label><input class="form-control" type="text" id="ext"
                                                                                    name="ext" value="" placeholder="123">
                                                                                <span
                                                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h5>Fundamentos Juridicos:</h5>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <h5>Origenes de Incecciones:</h5>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div id="image-preview" class="container">
                                                                        <img id="image" src="data:image/png;base64,"
                                                                            onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'"
                                                                            class="img-thumbnail card-img-top"
                                                                            alt="User Image"
                                                                            style="height: 220px; width: 220px; object-fit:cover;">
                                                                    </div>

                                                                    <div class="custom-file my-4">
                                                                        <input type="file" class="custom-file-input"
                                                                            id="customFile" accept="image/png, image/jpeg">
                                                                        <label class="custom-file-label"
                                                                            for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="box-footer text-center">
                                                            <button type="button"
                                                                onclick="window.location.href='{{ url('/usuarios') }}'"
                                                                class="btn btn-default">Cancelar</button>
                                                            <button type="submit" id="btnSave" name="btnSave"
                                                                class="btn btn-info pull-right">Guardar</button>
                                                        </div><!-- /.box-footer -->
                                                    </form>
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
    <script src="{{ asset('js/inspectores/inspector-add.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2().val("");
            $("#subdependencia_id").select2().val("");
        });


        document.getElementById("customFile").onchange = function(e) {
            let reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            //previsualizar la imagen
            reader.onload = function() {
                let preview = document.getElementById('image-preview'),
                    image = document.createElement('img');
                image.className = 'img-thumbnail card-img-top';

                image.style.height = '220px';
                image.style.width = '220px';
                image.style.objectFit = 'cover';

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }
    </script>
@stop
