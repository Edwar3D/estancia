<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\V1\Usuario;
use App\Models\V1\Dependencia;
use Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(!isset($request["act"])){
            return view('usuarios.list');
        } else{
            $datosTabla = Usuario::with('dependencia')->with('arealaboral')->where('estatus','=', 1)->paginate(100);
            $datosTabla->withPath('usuarios.list');
            $response=[
                'success'=> true,
                'html' => view('usuarios.data.list-tabla',compact('datosTabla'))->render()
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

        if($request['act'] == null){
            $dependencia_items = Dependencia::where('subdependencia','=', 0)->get();
            $subdependencia_items = [];
            return view('usuarios.add', compact('dependencia_items','subdependencia_items'));
        }else{
            if($request['dependencia_id']>0){
                $subdependencia_items = Dependencia::select('id','dependencia as text')->where('parent_id',"=" ,$request['dependencia_id'])->get();

            }else{
                $subdependencia_items = [];
            }
             $response=[
                'success'=> true,
                'de'=>$request['dependencia_id'],
                'data' => $subdependencia_items,
            ];
            return response()->json($response);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $obj_tabla = new Usuario;

            $obj_tabla->username = $request["username"];
            $obj_tabla->email = $request["username"];
            $obj_tabla->password = bcrypt($request["password"]);
            $obj_tabla->nombres = $request["nombre"];
            $obj_tabla->apellidos = $request["apellidos"];
            $obj_tabla->dependencia_id = $request["dependencia_id"];
            $obj_tabla->area_laboral = $request["subdependencia_id"];
            //$obj_tabla->is_movil = $request["is_movil"];
            /* $obj_tabla->tel_oficina = $request["tel_oficina"];
            $obj_tabla->extension = $request["extensiones"];
            $obj_tabla->celular = $request["celular"]; */
            $obj_tabla->created_at =  date('Y-m-d H:i:s');
            $obj_tabla->user_created=Auth::user()->id;
            $obj_tabla->updated_at =  date('Y-m-d H:i:s');
            $obj_tabla->user_updated=Auth::user()->id;
            $obj_tabla->estatus =  1;

            $obj_tabla->save();
            $message = 'Almacenado con éxito';
        return ['success' => true,'message' => $message];
        } catch(\Exception $e){
           // do task when error
           //return $e->getMessage();   // insert query
            //return "Error al Guardar los datos";
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
        $info = Usuario::where('id', $id)->first();

        $dependencia_items = Dependencia::where('id','>', 0)->where('subdependencia','=',0)->get();

        if($info->dependencia == null)
            $subdependencia_items = [];
        else
            $subdependencia_items = Dependencia::where('parent_id','=', $info->dependencia_id)->get();

        return view('usuarios.edit', compact('info','dependencia_items','subdependencia_items'));
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
        try {
            $obj_tabla = Usuario::find($id);

            $obj_tabla->nombres = $request["nombre"];
            $obj_tabla->apellidos = $request["apellidos"];
            $obj_tabla->dependencia_id = $request["dependencia_id"];
            $obj_tabla->area_laboral = $request["subdependencia_id"];
            if($request["password"]!=''){
            $obj_tabla->password = bcrypt($request["password"]);
            }
            //$obj_tabla->is_movil = $request["is_movil"];
           /*  $obj_tabla->tel_oficina = $request["tel_oficina"];
            $obj_tabla->extension = $request["extensiones"];
            $obj_tabla->celular = $request["celular"]; */
            $obj_tabla->updated_at =  date('Y-m-d H:i:s');
            $obj_tabla->user_updated = Auth::user()->id;

            $obj_tabla->save();
            $message = 'Almacenado con éxito';
        return ['success' => true,'message' => $message];
        } catch(\Exception $e){
           // do task when error
           //return $e->getMessage();   // insert query
            //return "Error al Guardar los datos";
            return ['success' => false,'message' => $e->getMessage()];
        }
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
            try {
                $obj_tabla = Usuario::find($id);

                $obj_tabla->estatus = 2;
                $obj_tabla->updated_at =  date('Y-m-d H:i:s');
                $obj_tabla->user_updated=Auth::user()->id;

                $obj_tabla->save();
                $message = 'Usuario Eliminado';
            return ['success' => true,'message' => $message];
            } catch(\Exception $e){
               // do task when error
               //return $e->getMessage();   // insert query
                //return "Error al Guardar los datos";
                return ['success' => false,'message' => $e->getMessage()];
            }
    }

}
