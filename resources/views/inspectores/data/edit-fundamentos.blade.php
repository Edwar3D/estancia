<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="container-fluid">
                    <div class="row card-tools d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-default" data-toggle="modal"
                            data-target="#añadirFundamento">
                            <i class="fa fa-plus"></i> Nuevo Fundamento
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="h6">Fundamentos Jurídicos del Inspector:</h6>
                                    <div id="dropzone" class="overflow-auto"></div>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="h6">Fundamentos Jurídicos resgistrados:</h6>
                                    <div id="modules" class="overflow-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-center">
                            <input type="hidden" name="id_inspector" id="id_inspector" disabled>
                            <button type="button" id="btnCancelFundamentos" class="btn btn-default"
                                onclick="cancelFundamentos()">Cancelar</button>
                            <button type="submit" id="btnSaveFundamentos" name="btnSave"
                                class="btn btn-info pull-right" onclick="SaveFundamentos()">Guardar</button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@section('content_js')
    <script src="{{ asset('js/fundamentos-juridicos/fundamentos-inspectores-edit.js') }}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    @parent
@endsection
