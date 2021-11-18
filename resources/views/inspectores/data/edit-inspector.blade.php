<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="container-fliud">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form role="form" id="form1" name="form1">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" id="id_registro" name="id_registro"
                                                    value="@php echo $inspector->id ?? '' @endphp" disabled>

                                                <div class="form-group has-feedback">
                                                    <label>Número de empleado:</label>
                                                    <input type="text"
                                                        class="form-control" id="numero_empleado"
                                                        name="numero_empleado" placeholder="13245678"
                                                        value="@php echo $inspector->numero_empleado ?? '' @endphp">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-feedback">
                                                    <label>Jefe Indemediato:</label><input class="form-control"
                                                        type="text" id="jefe" name="jefe" placeholder="Nombre completo"
                                                        value="@php echo $inspector->jefe ?? '' @endphp">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Nombre:</label><input type="text" class="form-control"
                                                        id="nombre" name="nombre" aria-required="true"
                                                        aria-describedby="url-error" aria-invalid="true"
                                                        placeholder="Nombre" value="@php echo $inspector->nombre ?? '' @endphp">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group has-feedback">
                                                    <label>Apellidos:</label><input class="form-control" type="text"
                                                        id="apellidos" name="apellidos" placeholder="Apellidos"
                                                        value="@php echo $inspector->apellidos ?? '' @endphp">
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
                                                            class="custom-control-input"
                                                            {{ $cargo->id == $inspector->cargo_id ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="cargo{{ $cargo->id }}">{{ $cargo->cargo }}</label>
                                                    </div>
                                                @endforeach
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
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $inspector->dependencia_id ? ' selected' : '' }}>
                                                                {{ $item->dependencia }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="hidden" id="id_areaAdmin" name="id_areaAdmin"
                                                    value="@php echo $inspector->area_administrativa ?? '' @endphp" disabled>
                                                <div class="form-group has-feedback">
                                                    <label>Unidad Administrativa</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        id="subdependencia_id" name="subdependencia_id">
                                                        <option value="">
                                                            Unidad Administrativa
                                                        </option>
                                                    </select>
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group has-feedback">
                                                    <label>Correo Institucional:</label><input class="form-control"
                                                        type="text" id="correo" name="correo"
                                                        placeholder="correo@dependencia.com" value="@php echo $inspector->email ?? '' @endphp">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label>Teléfono:</label><input class="form-control" type="text"
                                                        id="telefono" name="telefono" placeholder="9611231234"
                                                        value="@php echo $inspector->telefono ?? '' @endphp">
                                                    <span
                                                        class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div id="image-preview" class="container">
                                            <img id="image" src="{{ $inspector->foto ?? '' }}"
                                                onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'"
                                                class="img-thumbnail card-img-top" alt="User Image"
                                                style="height: 220px; width: 220px; object-fit:contain;">
                                        </div>
                                        <div class="custom-file my-4 form-group has-feedback">
                                            <input type="file" class="custom-file-input" id="foto_perfil"
                                                name="foto_perfil" accept="image/png, image/jpeg"
                                                >
                                            <label class="custom-file-label" for="foto_perfil">Subir foto</label>
                                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-center">
                                <button type="button" onclick="window.location.href='{{ url('/inspectores') }}'"
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
    <script src="{{ asset('js/inspectores/inspector-edit.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
        //previzar imagen para foto de perfil
        document.getElementById("foto_perfil").onchange = function(e) {
            console.log('cargando')
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
