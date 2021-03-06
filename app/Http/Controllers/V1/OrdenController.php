<?php

namespace App\Http\Controllers\V1;

use App\Models\V1\Orden;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\V1\DocumentoOrden;
use App\Models\V1\Inspector;
use App\Models\V1\tipoDocumento;
use App\Models\V1\TipoInspeccion;
use App\Models\V1\Zona;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrdenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!isset($request["act"])) {
            return view('ordenes.list');
        } else {
            $ordenes =  Orden::with('estatus')
                    ->where('dependencia_id', '=', Auth::user()->dependencia_id)->orderBy('fecha', 'DESC')->paginate(100);
            $response = [
                'success' => true,
                'html' => view('ordenes.data.tabla-ordenes', compact('ordenes'))->render()
            ];
            return response()->json($response);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $tiposInspeccion = TipoInspeccion::get();
        $zonas = Zona::get();
        $tiposDocumento = tipoDocumento::get();
        $inspectores = Inspector::where('dependencia_id', '=', Auth::user()->dependencia_id)->get();

        return view('ordenes.add', compact('tiposInspeccion', 'zonas', 'inspectores', 'tiposDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $newOrden = new Orden;
            $newOrden->folio = $request["folio"];
            $newOrden->direccion = $request["direccion"];
            $newOrden->fecha = Carbon::createFromFormat('d/m/Y', $request["fecha"]);
            $newOrden->tipo_id = $request["tipo"];
            $newOrden->zona_id = $request["zona"];
            $newOrden->inspector_id = $request["inspector_id"];
            $newOrden->dependencia_id = Auth::user()->dependencia_id;
            $newOrden->user_created = Auth::user()->id;
            $newOrden->user_updated = Auth::user()->id;
            $newOrden->estatus_id = 1;
            $newOrden->save();

            $message = 'Almacenado con ??xito';
            $response = [
                'success' => true,
                'message' => $message,
                'idOrden' => $newOrden->id,
            ];
        } catch (\Exception $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage()
            ];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $orden = Orden::find($id);
            return  [
                'success' => true,
                'data' => $orden
            ];
        } catch (\Exception $e) {
            return  ['success' => false];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function edit(Orden $orden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orden $orden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orden  $orden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orden $orden)
    {
        //
    }
}
