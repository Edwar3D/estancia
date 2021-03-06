@extends('layouts.ciudadano')

@section('header')
    @parent

    <a class=" float-right btn btn-secondary  btn-sm mx-2 my-2" href="javascript:history.back()">
        <i class="fas fa-arrow-circle-left d-inline"></i>
        <span class="d-inline">Regresar</span>
    </a>
@endsection

@section('content')
    <div class="container my-3">
        <div class="row">
            <h3 class="col-12 h3 text-center font-weight-light mb-4">
                Datos del Inspector
            </h3>
        </div>
        <div class="row ">
            <div class="col-md-3 col-8 mx-auto my-auto">
                <div class="card align-items-center">
                    <img src="{{ $inspector->foto ?? '' }}"
                        onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'"
                        class="card-img-top mt-sm-3" alt="User Image">
                    <div class="card-body">
                        <div class="row">
                            <h5 class="card-title text-center font-weight-bold col-12">
                                {{ $inspector->nombre ?? '' }}
                                {{ $inspector->apellidos ?? '' }}</h5>
                            <span class="col-sm-12 col-form-label text-center">
                                Cargo:
                                @if ($inspector)
                                    {{ $inspector->cargo->cargo ?? 'No encontrado' }}
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
            <div class="card col-md-9 col-sm-12 ">
                <h5 class="card-header text-center font-weight-bold">{{ $inspector->dependencia->dependencia ?? '' }}</h5>
                <div class="card-body">
                    <dl class="row h-100 pt-md-2 pt-sm-0">
                        <dt class="col-sm-12 col-md-5 col-lg-3 control-label font-weight-700">Área Administrativa:</dt>
                        <dd class="col-sm-12 col-md-7 col-lg-9 font-weight-normal">
                            {{ $inspector->areaadministrativa->dependencia ?? '' }}</dd>

                        <dt class="col-sm-12 col-md-5 col-lg-3  control-label font-weight-700">Jefe Inmediato:</dt>
                        <dd class="col-sm-12 col-md-7 col-lg-9  font-weight-normal">{{ $inspector->jefe ?? '' }}</dd>

                        <dt class="col-sm-12 col-md-5 col-lg-3 control-label font-weight-700">Dirrección:</dt>
                        <dd class="col-sm-12 col-md-7 col-lg-9 font-weight-normal">
                            {{ $inspector->dependencia->direccion ?? '' }}</dd>

                        <dt class="col-sm-12  col-md-5 col-lg-3  control-label font-weight-700">Correo institucional:</dt>
                        <dd class="col-sm-12  col-md-7 col-lg-9 font-weight-normal">{{ $inspector->email ?? '' }}</dd>

                        <dt class="col-sm-12 col-md-5 col-lg-3 control-label font-weight-700">Teléfono:</dt>
                        <dd class="col-sm-12 col-md-7 col-lg-9 font-weight-normal">{{ $inspector->telefono ?? '' }} EXT
                            2268</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="row pl-1">
            <table class="table">
                <thead class="bg-green-custom">
                    <tr>
                        <th class="col-6" scope="">Fundamentos Jurídicos Legales:</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inspector->fundamentos as $fundamento)
                        <tr>
                            <td>
                                <p class="font-weight-bold"><i class="far fa-newspaper"></i>  {{ $fundamento->fundamento ?? '' }}</p>
                                <a  class="text-secondary font-italic pl-3" href={{ $fundamento->url ?? '' }} target="_blank" rel="noopener noreferrer">
                                    {{ $fundamento->url ?? '' }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
