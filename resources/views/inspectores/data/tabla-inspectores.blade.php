
<div class="row  justify-content-center">
    <p> Mostrando registros del {{ $inspectores->firstItem() }} al {{ $inspectores->lastItem() }} de un total de {{ $inspectores->total() }} registros </p>
    <div class="w-100 p-3">
        <div id="table-inspectores">
            <table class="table table-sm table-hover table-striped  table-responsive-md ">
                <thead>
                    <tr class="bg-green-custom">
                        <th scope="col">Num. de empleado</th>
                        <th scope="col">Nombre del inspector</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Area laboral</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inspectores as $inspect)
                        <tr class="filas ">
                            <td>
                                {{ $inspect->numero_empleado ?? '' }}
                            </td>
                            <th>
                                <a class="font-weight-blod text-dark"
                                    href="{{ route('ciudadano.verInspector', [$inspect->id]) }}">
                                    {{ $inspect->nombre }}
                                    {{ $inspect->apellidos }}
                                </a>
                            </th>
                            <td>
                                {{ $inspect->cargo->cargo ?? '' }}
                            </td>
                            <td>
                                {{ $inspect->areaadministrativa->dependencia ?? '' }}
                            </td>
                            <td style="text-align: center;">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">Acciones</button>
                                    <button type="button" class="btn btn-success  dropdown-toggle dropdown-icon"
                                        data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('inspectores.edit', [$inspect->id]) }}">
                                            <i class="fas fa-edit"></i>
                                            Editar
                                        </a>
                                        <a class="dropdown-item" href="javascript:;"
                                            onclick="f_delete_row('{{route('inspectores.destroy',[$inspect->id ])}}','{{ $inspect->nombre }}');">
                                            <i class="fas fa-trash"></i>
                                            Eliminar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $inspectores->links() }}
        </div>
    </div>
</div>
