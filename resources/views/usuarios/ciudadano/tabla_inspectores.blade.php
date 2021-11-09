@extends('layouts.ciudadano')

@section('header')
    @parent
@endsection

@section('content')
    <div class="container-fluid p-4 ">
        @include('usuarios.ciudadano.search')
    </div>

    <div class="row  justify-content-center">
        @if ($count != 0)
            <div class="w-75 p-3">
                <div id="table-inspectores">
                    <table class="table table-sm table-hover table-striped  table-responsive-md ">
                        <thead>
                            <tr class="bg-green-custom">
                                <th scope="col">Nombre del inspector</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Dependencia</th>
                                <th scope="col">inspecciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inspectores as $inspect)
                                <tr class="filas ">
                                    <th>
                                        <a class="font-weight-blod text-dark" href="{{ route('ciudadano.verInspector', [$inspect->id]) }}">
                                            {{ $inspect->nombre }}
                                        </a>
                                    </th>
                                    <td>
                                        {{$inspect->cargo->cargo ?? ''}}
                                    </td>
                                    <td>
                                        @foreach ($dependencias as $item)
                                            @if ($inspect->dependencia_id == $item->id)
                                                {{ $item->dependencia }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <!-- Button modal -->
                                        <a type="button" class="btn btn-link" data-toggle="modal"
                                            data-target="#inspeccionesModal{{ $inspect->id }}">
                                            Ver
                                        </a>
                                        <!-- Modal -->
                                        <x-modal-inspecciones idInspector="{{ $inspect->id }}"
                                            nombreInspector="{{ $inspect->nombre }}">
                                            <h5 class="modal-title text-center col-11" id="inspeccionesModalLabel">
                                                {{ $inspect->nombre }}</h5>
                                        </x-modal-inspecciones>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $inspectores->links() }}
                </div>
            </div>
        @else
            <h5 class="h5 mt-5">No se encontró ningun inspector</h5>
        @endif

    </div>
    <script>
        function verInspector(id) {
            fetch("/ciudadano/inspector/" + id)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('ver-inspector').innerHTML = html;
                });
        }
    </script>
@endsection
