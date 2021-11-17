<style>
    #modules {
        height: 25pc;
        padding: 20px;
        background: #eee;
        margin-bottom: 20px;
        z-index: 1;
        border-radius: 10px;
        overflow: visible;
    }

    #dropzone {
        padding: 20px;
        background: #eee;
        height: 25pc;
        margin-bottom: 20px;
        z-index: 0;
        border-radius: 10px;
    }

    .active-zone {
        outline: 1px solid red;
    }

    .hover {
        outline: 1px solid blue;
    }

    .drop-item {
        cursor: pointer;
        margin-bottom: 10px;
        background-color: rgb(255, 255, 255);
        padding: 5px 10px;
        border-radius: 5px;
        border: 1px solid rgb(204, 204, 204);
        position: relative;
    }

    .drop-item .remove {
        position: absolute;
        top: 4px;
        right: 4px;
    }

</style>
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
                                    <h6 class="h6">Fundamentos Jurídicos resgistrados:</h6>
                                    <div id="modules" class="overflow-auto">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <h6 class="h6">Fundamentos Jurídicos para el Inspector:</h6>
                                    <div id="dropzone" class="overflow-auto"></div>
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
    <div class="modal fade" id="añadirFundamento" tabindex="-1" role="dialog"
        aria-labelledby="añadirFundamentoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="añadirFundamentoLabel">
                        Nuevo Fundamento Jurídico
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formFundamentos" name="formFundamentos">
                    <div class="modal-body">

                        <div class="form-group has-feedback">
                            <label>Fundamento Jurídico:</label><input class="form-control" type="text" id="fundamento"
                                name="fundamento" placeholder="Fundamento Jurídico">
                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label>url:</label><input class="form-control" type="url" id="url" name="url"
                                placeholder="https://">
                            <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCloseModal" class="btn btn-secondary" data-dismiss="modal">cancelar</button>
                        <button type="submit" id="btnNewFundamento" name="btnNewFundamento"
                            class="btn btn-info pull-right">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@section('content_js')
    <script src="{{ asset('js/fundamentos-juridicos/fundamentos-inspectores.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"
        integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script>
    @parent
@endsection
