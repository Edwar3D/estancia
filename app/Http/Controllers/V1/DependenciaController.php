<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\V1\Dependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!isset($request["act"])) {
            return view('dependencias.list');
        } else {
            $datosTabla = Dependencia::where('estatus', '=', 1)->paginate(100);
            $datosTabla->withPath('depedencias.list');
            $response = [
                'success' => true,
                'html' => view('dependencias.data.list-tabla-dependencias', compact('datosTabla'))->render()
            ];

            return response()->json($response);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencia_items = Dependencia::where('id', '>', 0)->where('subdependencia', '=', 0)->get();
        return view('dependencias.add', compact('dependencia_items'));
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
            $new_dependencia = new Dependencia;
            $new_dependencia->dependencia = $request["nombre"];
            $new_dependencia->responsable = $request["responsable"];
            $new_dependencia->direccion = $request["direccion"];
            $new_dependencia->telefono = $request["telefono"];
            $new_dependencia->ext = $request["ext"];
            $new_dependencia->email = $request["correo"];
            if ($request["dependencia_id"] == 0 || $request["dependencia_id"] == '') {
                $new_dependencia->parent_id = null;
                $new_dependencia->subdependencia = 0;
            } else {
                $new_dependencia->subdependencia = 1;
                $new_dependencia->parent_id = $request["dependencia_id"];
            }
            $new_dependencia->nivel = 0;
            $new_dependencia->estatus = 1;
            $new_dependencia->user_created = Auth::user()->id;
            $new_dependencia->user_updated = Auth::user()->id;
            $new_dependencia->save();
            $message = 'Almacenado con éxito';
            $response = [
                'success' => true,
                'message' => $message
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dependencia_items = Dependencia::where('subdependencia', '=', 0)->where('id', '!=', $id)->get();
        $dependencia = Dependencia::find($id);
        return view('dependencias.edit', compact('dependencia', 'dependencia_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $dependecia = Dependencia::find($id);

            $dependecia->dependencia = $request["nombre"];
            $dependecia->responsable = $request["responsable"];
            $dependecia->direccion = $request["direccion"];
            $dependecia->telefono = $request["telefono"];
            $dependecia->ext = $request["ext"];
            $dependecia->email = $request["correo"];
            if ($request["dependencia_id"] == 0 || $request["dependencia_id"] == '') {
                $dependecia->parent_id = null;
                $dependecia->subdependencia = 0;
            } else {
                $dependecia->subdependencia = 1;
                $dependecia->parent_id = $request["dependencia_id"];
            }
            $dependecia->nivel = 0;
            $dependecia->estatus = 1;
            $dependecia->user_updated = Auth::user()->id;
            $dependecia->updated_at =  date('Y-m-d H:i:s');

            $dependecia->save();
            $message = 'Actualización Exitosa';
            $response = [
                'success' => true,
                'message' => $message
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dependecia = Dependencia::find($id);

            $dependecia->estatus = 0;
            $dependecia->updated_at =  date('Y-m-d H:i:s');
            $dependecia->user_updated = Auth::user()->id;

            $dependecia->save();
            $message = 'Dependencia Eliminado';
            $response = [
                'success' => true,
                'message' => $message
            ];
        } catch (\Exception $e) {
            // do task when error
            //return $e->getMessage();   // insert query
            //return "Error al Guardar los datos";
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($response);
    }
}
