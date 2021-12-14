<div class="row  justify-content-center">
    <p> Mostrando registros del {{ $ordenes->firstItem() }} al {{ $ordenes->lastItem() }} de un total de {{ $ordenes->total() }} registros </p>
    <div class="w-100 p-3">
        <div id="table-ordenes">
            <table class="table table-sm table-hover table-striped  table-responsive-md ">
                <thead>
                    <tr class="bg-green-custom">
                        <th scope="col">Folio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordenes as $orden)
                        <tr class="filas ">
                            <td>
                                {{ $orden->folio ?? '' }}
                            </td>
                            <td>
                                {{ $orden->fecha ?? '' }}
                            </td>
                            <td>
                                {{ $orden->estatus->estatus ?? '' }}
                            </td>
                            <td>
                                {{ $orden->tipo->tipo ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ordenes->links() }}
        </div>
    </div>
</div>

