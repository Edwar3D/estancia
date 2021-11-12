<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="container-fluid">
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
                                                    value="@php echo $inspector->arealaboral->dependencia ?? '' @endphp" required>
                                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <label>Depende de: </label>
                                                <select class="form-control select2" id="dependencia_id"
                                                    name="dependencia_id" form="form">
                                                    @foreach ($subdependencias as $item)
                                                    <option value="{{ $item->id }}" selected>
                                                        {{ $item->dependencia }}</option>
                                                    @endforeach
                                                    <option value="{{ $inspector->dependencia->id }}" selected>
                                                        {{ $inspector->dependencia->dependencia }}</option>
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
                                                value="@php echo $inspector->dependencia->responsable @endphp" required>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-9 mx-auto">
                                        <div class="form-group has-feedback">
                                            <label>Dirreción</label>
                                            <input type="text" class="form-control" id="dirreccion" name="direccion"
                                                aria-required="true" aria-describedby="url-error" aria-invalid="true"
                                                placeholder="Dirreción de la dependencia" value="@php echo $inspector->dependencia->direccion @endphp"
                                                required>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mx-auto">
                                        <div class="form-group has-feedback">
                                            <label>Correo</label>
                                            <input type="mail" class="form-control" id="correo" name="correo"
                                                aria-required="true" aria-describedby="url-error" aria-invalid="true"
                                                placeholder="nombre@dependencia.com" value="@php echo $inspector->dependencia->email @endphp" required>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row mx-auto">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Teléfono</label>
                                                <input class="form-control" type="text" id="telefono" name="telefono"
                                                    placeholder="9611231111" value="@php echo $inspector->dependencia->telefono @endphp" required>
                                                <span
                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group has-feedback">
                                                <label>Extencion</label>
                                                <input class="form-control" type="tel" id="tel_oficina" name="ext"
                                                    placeholder="111" value="@php echo $inspector->dependencia->ext @endphp">
                                                <span
                                                    class="glyphicon glyphicon-phone-alt  form-control-feedback"></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="box-footer text-center">
                                <input type="hidden" name="id_registro" id="id_registro" value="@php echo $inspector->dependencia->id @endphp">
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
            </div>
        </div>
    </div>

</section>
