
<div id="table-inspectores">
    <table class="table table-hover table-striped ">
        <thead>
            <tr>
                <th scope="col">Nombre del inspector</th>
                <th scope="col">Cargo</th>
                <th scope="col">Dependencia</th>
                <th scope="col">Inspeciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inspectores as $inspect)
                <tr onclick="verInspector({{ $inspect->id }})">
                    <td>
                        <a>
                            {{ $inspect->nombre }}
                        </a>
                    </td>
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
                    <td><a class="text-center">ver</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $inspectores->links() }}
    </div>
</div>
