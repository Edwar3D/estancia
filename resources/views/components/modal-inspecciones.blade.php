<div class="modal fade" id="inspeccionesModal{{$idInspector}}" tabindex="-1" aria-labelledby="inspeccionesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
               {{$slot}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ( sizeof($ordenes) != 0)
                <table class="table table-sm table-hover table-striped">
                    <thead  class="bg-green-custom">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenes as $orden )
                        <tr>
                            <td>
                                {{$orden->fecha ?? ''}}
                            </td>
                            <td>
                                {{$orden->direccion ?? ''}}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                    <p class="text-center">No hay inspeciones todavia</p>
                @endif


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
