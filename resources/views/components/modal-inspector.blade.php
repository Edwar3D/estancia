<div class="modal fade bd-example-modal-lg" id="inspectorModal{{ $inspector->id }}" tabindex="-1"
    aria-labelledby="inspectorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center col-11">Datos del Inspector</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="px-3 pb-3 container  border-green-custom rounded ">
                    <h2 class="h2 text-center my-2">{{ $dependencia->dependencia ?? '' }}</h2>
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <img src="data:image/png;base64,"
                                    onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'"
                                    class="card-img-top " alt="User Image">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title text-center font-weight-bold col-12">
                                            {{ !empty($inspector->nombre) ? $inspector->nombre : '' }}</h5>
                                        <span class="col-sm-5 col-form-label">Cargo:</span>
                                        <span class="col-sm-7 col-form-label text-center">
                                            @if ($inspector)
                                                @if ($inspector->cargo === 0)
                                                    Inspector
                                                @elseif ($inspector->cargo === 1)
                                                    Verificador
                                                @else
                                                    Supervisor
                                                @endif
                                            @endif
                                        </span>
                                    </div>
                                    <p class="card-text text-center col-12">
                                        <small class="text-muted">
                                            Núm.de empleado: {{ $inspector->numero_empleado ?? '' }}
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <dl class="col-8 row">
                            <dt class="col-sm-3">Unidad Administrativa</dt>
                            <dd class="col-sm-9 font-weight-normal">{{ $dependencia->unidad_administrativa ?? '' }}</dd>

                            <dt class="col-sm-3">Jefe Inmediato</dt>
                            <dd class="col-sm-9 font-weight-normal">{{ $inspector->jefe ?? '' }}</dd>

                            <dt class="col-sm-3">Dirreccion</dt>
                            <dd class="col-sm-9 font-weight-normal">{{ $dependencia->direccion ?? '' }}</dd>

                            <dt class="col-sm-3">Correo</dt>
                            <dd class="col-sm-9 font-weight-normal">{{ $inspector->email ?? '' }}</dd>

                            <dt class="col-sm-3">Teléfono</dt>
                            <dd class="col-sm-9 font-weight-normal">{{ $inspector->telefono ?? '' }} EXT 2268</dd>
                        </dl>
                        <div class="row ">
                            <table class="table col-12">
                                <thead class="bg-green-custom">
                                    <tr>
                                        <th class="col-6" scope="">Fundamentos Legales:</th>
                                        <th class="col-6" scope="">Origen de la inspección</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-weight-normal">
                                            {{ $inspector->fundamentos_juridicos ?? '' }}
                                        </td>
                                        <td class="font-weight-normal">
                                            {{ $inspector->origen_inspeccion ?? '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
