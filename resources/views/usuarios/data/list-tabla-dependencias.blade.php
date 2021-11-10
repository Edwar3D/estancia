@unless($datosTabla->count() > 0)
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
    <p> Mostrando registros del {{ $datosTabla->firstItem() }} al {{ $datosTabla->lastItem() }} de un total de
        {{ $datosTabla->total() }} registros </p>
    <table class="table table-bordered table-striped datatable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($datosTabla as $datoActual)
                <tr>
                    <th>
                        {{ $datoActual->dependencia ?? '' }}
                    </th>
                    <td>
                        {{ $datoActual->responsable ?? '' }}
                    </td>
                    <td>
                        {{ $datoActual->direccion ?? '' }}
                    </td>
                    <td>
                        {{ $datoActual->telefono ?? '' }}
                        @if ($datoActual->ext)
                            <span>EXT</span> {{ $datoActual->ext ?? '' }}
                        @endif
                    </td>
                    <td>
                        {{ $datoActual->email ?? '' }}
                    </td>
                    <td style="text-align: center;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Acciones</button>
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon"
                                data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="javascript:;"
                                    onclick="window.location.href='{{ url('/dependencias/' . $datoActual->id . '/edit') }}'"><i
                                        class="fas fa-edit"></i>Editar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:;"
                                    onclick="f_delete_row('dependencias/@php echo $datoActual->id @endphp','{{  $datoActual->dependencia }}');"><i
                                        class="fas fa-trash"></i>Eliminar</a>
                            </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $datosTabla->links() }}
@endunless
