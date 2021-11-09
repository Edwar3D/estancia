@unless($datosTabla->count()>0)
    <!--<h4>Sin Informacion Registrada</h4>-->
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Responsable</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>

        <tbody>
        <tr>
            <td colspan="9" style="text-align: center;"> Sin resultados </td>
        </tr>
        </tbody>

    </table>

@else
    <p> Mostrando registros del {{ $datosTabla->firstItem() }} al {{ $datosTabla->lastItem() }} de un total de {{ $datosTabla->total() }} registros </p>
    <table class="table table-bordered table-striped datatable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Responsable</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>

        <tbody>
             @foreach($datosTabla as $datoActual)
                <tr>


                </tr>
                @endforeach
        </tbody>

    </table>
     {{$datosTabla->links()}}
@endunless
