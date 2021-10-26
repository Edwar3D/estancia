<div class="px-3 pb-3 container border rounded ">
    <h2 class="h2 text-center my-2">{{$dependencia->dependencia ?? ''}}</h2>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <img src="data:image/png;base64," onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'" class="card-img-top" alt="User Image">
                <div class="card-body">
                    <div class="form-group row">
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
                    <h5 class="card-title text-center col-12">{{!empty($inspector->nombre) ? $inspector->nombre:''}}</h5>
                    <p class="card-text text-center col-12"><small class="text-muted">Núm.de empleado: {{$inspector->numero_empleado ?? ''}}</small></p>
                </div>
            </div>
        </div>
        <dl class="col-8 row">
            <dt class="col-sm-4">Unidad Administrativa</dt>
            <dd class="col-sm-8">{{$dependencia->unidad_administrativa ?? ''}}</dd>

            <dt class="col-sm-4">Jefe Inmediato</dt>
            <dd class="col-sm-8">{{$inspector->jefe ?? ''}}</dd>

            <dt class="col-sm-4">Dirreccion</dt>
            <dd class="col-sm-8">{{$dependencia->direccion ?? ''}}</dd>

            <dt class="col-sm-4">Correo</dt>
            <dd class="col-sm-8">{{$inspector->email ?? ''}}</dd>

            <dt class="col-sm-4">Teléfono</dt>
            <dd class="col-sm-8">{{$inspector->telefono ?? ''}} EXT 2268</dd>
        </dl>
        <div class="row ">
            <table class="table col-12">
                <thead>
                    <th class="col-6" scope="">Fundamentos Legales:</th>
                    <th class="col-6" scope="">Origen de la inspección</th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        {{$inspector->fundamentos_juridicos ?? ''}}
                    </td>
                    <td>
                        {{$inspector->origen_inspeccion ?? ''}}
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>

    </div>
</div>
