<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\V1\Dependencia;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!isset($request["act"])){
            return view('usuarios.dependencia.list');
        } else{
            $datosTabla = Dependencia::paginate(100);
            $datosTabla->withPath('usuarios.depedencia.list');
            $response=[
                'success'=> true,
                'html' => view('usuarios.data.list-tabla-dependencias',compact('datosTabla'))->render()
            ];

            return view('usuarios.dependencia.list',compact('datosTabla'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dependencia_items = Dependencia::where('id','>', 0)->get();
        return view('usuarios.dependencia.add', compact('dependencia_items'));
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
            $obj_tabla = new Dependencia;
            $obj_tabla->dependencia = $request["nombre"];
            $obj_tabla->responsable = $request["responsable"];
            $obj_tabla->direccion = $request["direccion"];
            $obj_tabla->telefono = $request["telefono"];
            $obj_tabla->ext = $request["ext"];
            $obj_tabla->email = $request["correo"];
            $obj_tabla->subdependencia = 0;
            $obj_tabla->parent_id = null;
            $obj_tabla->nivel= 0;
            $obj_tabla->user_created = Auth::user()->id;
            $obj_tabla->user_updated = Auth::user()->id;
            $obj_tabla->save();
            $message = 'Almacenado con éxito';
        return ['success' => true,'message' => $message];
        } catch(\Exception $e){
            return ['success' => false,'message' => $e->getMessage()];
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
