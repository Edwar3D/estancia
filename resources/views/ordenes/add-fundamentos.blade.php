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
                            <input  name="id_orden" id="id_orden" disabled>
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
