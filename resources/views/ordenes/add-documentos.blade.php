<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid">
                    <!-- /.card-header -->

                    <div class="card-body">

                        <div class="conatiner-fluid">


                            <form method="POST" action="{{route('subirArchivo')}}" class="col-12" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label>Tipo de docuemento:</label>
                                            <select class="form-control select2" style="width: 100%;" id="tipo"
                                                name="tipo" tabindex="Tipo de inspeccion">
                                                {{-- @foreach ($inspectores as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nombre }} {{ $item->apellidos }}
                                                </option>
                                            @endforeach --}}
                                            </select>
                                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-feedback">
                                            <label>Folio:</label>
                                            <div class="custom-file">
                                                <input class="form-control form-control-sm" id="file"  name="file" type="file"  accept="application/pdf" required>
                                                <span class="glyphicon glyphicon-info-sign  form-control-feedback">

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer text-center m-3">
                                    <button type="submit" id="btnSave" name="btnSave"
                                        class="btn btn-info pull-right ml-2">Subir</button>
                                </div>
                            </form>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@section('content_js')
    <script type="text/javascript">
        @parent
        $(function() {
            $("#file").on('change', function(event) {
                var file = event.target.files[0];

            });
        });
    </script>
@stop
