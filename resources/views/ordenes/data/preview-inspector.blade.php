<div class="row no-gutters bg-light position-relative">
    <div class="col-sm-6 mb-md-0 p-md-2">
        <img src="{{ $inspector->foto ?? '' }}"
            onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'"
            class="card-img-top img-fluid img-thumbnail" alt="User Image">
    </div>
    <div class="col-sm-6 position-static pt-4 p-2 pl-md-0">
        <span class="card-text text-center col-12">
            <small class="text-muted">
                Núm.de empleado: {{ $inspector->numero_empleado ?? '' }}
            </small>
        </span>
        <dl class="row pt-md-2 pt-sm-0">
            <dt class="col-sm-12 control-label font-weight-700">Nombre:</dt>
            <dd class="col-sm-12 font-weight-normal">{{ $inspector->nombre ?? '' }} {{ $inspector->apellidos ?? '' }}</dd>

            <dt class="col-sm-12 control-label font-weight-700">Cargo:</dt>
            <dd class="col-sm-12 font-weight-normal">{{ $$inspector->cargo->cargo ?? ''}}</dd>

            <dt class="col-sm-12  control-label font-weight-700">Áre Administrativa:</dt>
            <dd class="col-sm-12  font-weight-normal">{{ $inspector->areaadminitrativa->dependencia ?? 'No encontrado' }}</dd>

            <dt class="col-sm-12  control-label font-weight-700">Teléfono:</dt>
            <dd class="col-sm-12  font-weight-normal">{{ $inspector->telefono ?? '' }}</dd>
        </dl>

    </div>
    <div class="text-right col-12 pr-2 mb-3">
        <a href="{{route('ciudadano.verInspector',[$inspector->id])}}" target="_blank" rel="noopener noreferrer"
            class="stretched-link">
            <span>Ver infromacion completa</span></a>
    </div>
</div>
