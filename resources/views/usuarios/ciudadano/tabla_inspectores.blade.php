@section('content')
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
                            <a type="button" class="btn font-weight-bold" data-toggle="modal" data-target="#inspectorModal{{ $inspect->id }}">
                                {{ $inspect->nombre }}
                            </a>
                            <!-- Modal -->
                            <x-modal-inspector idInspector="{{ $inspect->id }}"/>
                        </th>
                        <td>
                            @if ($inspect->cargo === 0)
                                Inspector
                            @elseif ($inspect->cargo === 1)
                                Verificador
                            @else
                                Supervisor
                            @endif
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
                            <a type="button" class="btn btn-link" data-toggle="modal" data-target="#inspeccionesModal{{ $inspect->id }}">
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

    <script>
        function verInspector(id) {
            fetch("/ciudadano/inspector/" + id)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('ver-inspector').innerHTML = html;
                });
        }
    </script>
