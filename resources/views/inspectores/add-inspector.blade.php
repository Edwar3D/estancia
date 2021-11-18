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
                        <form role="form" id="form1" name="form1">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label>Número de empleado:</label><input type="text"
                                                        class="form-control" id="numero_empleado"
                                                        name="numero_empleado" aria-required="true"
                                                        aria-describedby="url-error" aria-invalid="true"
                                                        placeholder="13245678">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-feedback">
                                                    <label>Jefe Indemediato:</label><input class="form-control"
                                                        type="text" id="jefe" name="jefe" placeholder="Nombre completo">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Nombre:</label><input type="text" class="form-control"
                                                        id="nombre" name="nombre" aria-required="true"
                                                        aria-describedby="url-error" aria-invalid="true"
                                                        placeholder="Nombre">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Apellidos:</label><input class="form-control" type="text"
                                                        id="apellidos" name="apellidos" placeholder="Apellidos">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row my-3">
                                            <h5 class="col-12">Cargo:</h5>

                                            <div class="container text-center mb-2">
                                                @foreach ($cargos as $cargo)
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="cargo{{ $cargo->id }}"
                                                            value="{{ $cargo->id }}" name="cargo"
                                                            class="custom-control-input">
                                                        <label class="custom-control-label"
                                                            for="cargo{{ $cargo->id }}">{{ $cargo->cargo }}</label>

                                                    </div>
                                                @endforeach
                                                <span
                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dependencia</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        id="dependencia_id" name="dependencia_id"
                                                        onchange="selectDependencia()">
                                                        <option value="" selected>Seleccione Dependencia</option>
                                                        @foreach ($dependencia_items as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->dependencia }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Unidad Administrativa</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        id="subdependencia_id" name="subdependencia_id">
                                                        <option value="" selected>
                                                            Unidad Administrativa
                                                        </option>
                                                    </select>
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Correo Institucional:</label><input class="form-control"
                                                        type="text" id="correo" name="correo"
                                                        placeholder="correo@dependencia.com">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 justify-content">
                                                <div class="form-group has-feedback">
                                                    <label>Teléfono:</label><input class="form-control" type="text"
                                                        id="telefono" name="telefono" placeholder="9611231234">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div id="image-preview" class="container">
                                            <img id="image" src="{{ asset('img/avatar-default.png') }}"
                                                class="img-thumbnail card-img-top" alt="User Image"
                                                style="height: 220px; width: 220px; object-fit:contain;">
                                        </div>

                                        <div class="custom-file my-4 form-group has-feedback">
                                            <input type="file" class="custom-file-input" id="foto_perfil"
                                                name="foto_perfil" accept="image/png, image/jpeg" required>
                                            <label class="custom-file-label" for="foto_perfil">Subir foto</label>
                                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-center">
                                <button type="button" id="btnCancel"  onclick="window.location.href='{{ url('/inspectores') }}'"
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

@section('content_js')
    @parent
    <script src="{{ asset('js/inspectores/inspector-add.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2().val("");
            $("#subfudamentos_id").select2().val("");
        });

        //previzar imagen para foto de perfil
        document.getElementById("foto_perfil").onchange = function(e) {
            let reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            //previsualizar la imagen
            reader.onload = function() {
                let preview = document.getElementById('image-preview'),
                    image = document.createElement('img');
                image.className = 'img-thumbnail card-img-top';

                image.style.height = '220px';
                image.style.width = '220px';
                image.style.objectFit = 'contain';

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }
    </script>

@endsection
