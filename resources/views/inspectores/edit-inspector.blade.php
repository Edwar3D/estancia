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
                                        <div class="row">
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
                                            {{-- @dd($cargos) --}}


                                            <div class="container text-center mb-2">
                                                @foreach ($cargos as $cargo)
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline{{ $cargo->id }}"
                                                            value="{{ $cargo->id }}" name="customRadioInline"
                                                            class="custom-control-input"
                                                            {{ $cargo->id == $inspector->cargo_id ? 'checked' : '' }}>
                                                        <label class="custom-control-label"
                                                            for="customRadioInline{{ $cargo->id }}">{{ $cargo->cargo }}</label>
                                                    </div>
                                                @endforeach
                                            </div>


                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group has-feedback">
                                                    <label>Area que laboral:</label>
                                                    <select class="form-control select2" style="width: 100%;"
                                                        id="area_laboral" name="area_laboral">

                                                        @foreach ($subdependencias as $item)
                                                        <option value="{{ $item->id }}"
                                                        {{$item->id == $inspector->area_administrativa ? 'selected' : ''}}>
                                                            {{ $item->dependencia }}</option>
                                                        @endforeach
                                                    </select>
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
                                                        id="Telefono" name="Telefono" placeholder="9611231234"
                                                        value="@php echo $inspector->telefono ?? '' @endphp">
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
                                            class="img-thumbnail card-img-top" alt="User Image" style="height: 220px; width: 220px; object-fit:cover;">
                                        </div>

                                        <div class="custom-file my-4">
                                            <input type="file" class="custom-file-input" id="customFile" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer text-center">
                                <button type="button" onclick="window.location.href='{{ url('/usuarios') }}'"
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
    <script>
        document.getElementById("customFile").onchange = function(e) {
            let reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            //previsualizar la imagen
            reader.onload = function() {
                let preview = document.getElementById('image-preview'),
                    image = document.createElement('img');
                    image.className= 'img-thumbnail card-img-top';

                    image.style.height = '220px';
                    image.style.width = '220px';
                    image.style.objectFit = 'cover';

                image.src = reader.result;

                preview.innerHTML = '';
                preview.append(image);
            };
        }
    </script>

@endsection
