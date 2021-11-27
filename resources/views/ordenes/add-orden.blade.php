<style>
    dl dt {
        font-size: 13px;
    }

    dl dd {
        font-size: 12px;
    }

</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="formOrden" name="formOrden">
                            <section class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-feedback">
                                                <label>Folio:</label>
                                                <input type="text" class="form-control" id="folio" name="folio"
                                                    aria-required="true" aria-describedby="url-error"
                                                    aria-invalid="true" placeholder="13245678">
                                                <span
                                                    class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group  has-feedback">
                                                <label>Fecha de inspeccion</label>
                                                <input class="form-control" type="text" id="fecha" name="fecha" />
                                                <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Tipo de inspeccion</label>
                                            <select class="form-control select2" style="width: 100%;"
                                                id="tipo" name="tipo"
                                                tabindex="Tipo de inspeccion">
                                                @foreach ($tiposInspeccion as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->tipo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12 justify-content">
                                        <div class="form-group has-feedback">
                                            <label>Dirección:</label>
                                            <input class="form-control" type="text" id="direccion" name="direccion"
                                                placeholder="Dirección a inspeccionar">
                                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="row p-4">
                                        <label class="col-12 ">Zona:</label>
                                        <div class="row pl-5 form-group has-feedback ">
                                            @foreach ($zonas as $zona)
                                                <div
                                                    class="custom-control custom-radio custom-control-inline col-md-5 ">
                                                    <input type="radio" id="zona{{ $zona->id }}"
                                                        value="{{ $zona->id }}" name="zona"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label font-weight-normal"
                                                        for="zona{{ $zona->id }}">{{ $zona->zona }}</label>
                                                </div>
                                            @endforeach
                                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                        </div>
                                    </div>

                                </div>
                                <!--Col derecha-->
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Inspector Asigando:</label>
                                            <select class="form-control select2" style="width: 100%;" id="inspector_id"
                                                name="inspector_id" tabindex="Tipo de inspeccion">
                                                @foreach ($inspectores as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->nombre }} {{ $item->apellidos }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id="preview-inespctor">
                                    </div>
                                </div>
                            </section>

                            {{-- <div class="custom-file my-3 form-group has-feedback col-md-6">
                                        <input type="file" class="custom-file-input" id="documento" name="documento"
                                            accept="application/pdf" required>
                                        <label class="custom-file-label" for="documento">Selecione el documento</label>
                                        <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                    </div> --}}
                            <div class="box-footer text-center m-3">
                                <button type="button" id="btnCancel"
                                    onclick="window.location.href='{{ url('/inspectores') }}'"
                                    class="btn btn-default mr-1">Cancelar</button>
                                <button type="submit" id="btnSave" name="btnSave"
                                    class="btn btn-info pull-right ml-2">Guardar</button>
                            </div><!-- /.box-footer -->


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('content_js')
    <script src="{{ asset('js/jquery.form.js') }}"></script>
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="{{ asset('js/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.js') }}"></script>

    <script src="{{ asset('js/fundamentos-juridicos/fundamentos-ordenes.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}" ></script>
    <script src="{{ asset('js/ordenes/ordenes-add.js') }}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $(".select2").select2().val("");
        });
    </script>
@stop
