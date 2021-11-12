<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\V1\Cargo;
use App\Models\V1\Dependencia;
use App\Models\V1\Inspector;
use Illuminate\Support\Facades\Auth;

class InspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(!isset($request["act"])){
            return view('inspectores.list');
        } else{
            if($request['search'] == ''){
                $search = '';
                $inspectores = Inspector::with('dependencia')->with('areaadministrativa')->where('dependencia_id','=', Auth::user()->dependencia_id)->paginate(100);
            }else{
                $inspectores = Inspector::with('dependencia')->with('areaadministrativa')->where('dependencia_id','=', Auth::user()->dependencia_id)->where('numero_empleado','like', "%{$request['search']}%")->paginate(100);
                $search = $request['search'];
            }

            $response=[
                're'=> $search,
                'success'=> true,
                'html' => view('inspectores.data.tabla-inspectores',compact('inspectores','search'))->render()
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

        $subdependencias = Dependencia::where('subdependencia','=',1)->where('parent_id','=',Auth::user()->dependencia_id)->get();
        $cargos = Cargo::get();
        return view('inspectores.add',compact('cargos','subdependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $newInspector =  new Inspector;
            $newInspector->numero_empleado =  $request["numero_empleado"];
            $newInspector->nombre =  $request["nombre"];
            $newInspector->apellidos =  $request["apellidos"];
            $newInspector->cargo_id =  $request["cargo"];
            $newInspector->dependencia_id = Auth::user()->dependencia_id;
            $newInspector->area_administrativa =  $request["area_administrativa"];
            $newInspector->jefe =  $request["jefe"];
            $newInspector->email =  $request["correo"];
            $newInspector->telefono =  $request["telefono"];
            $newInspector->foto = 'null';
            /* $newInspector->created_at =  date('Y-m-d H:i:s');
            $newInspector->user_created=Auth::user()->id;
            $newInspector->updated_at =  date('Y-m-d H:i:s');
            $newInspector->user_updated=Auth::user()->id; */
            $newInspector->estado_actual =  1;

            $newInspector->save();
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

        $inspector = Inspector::with('dependencia')->with('areaadministrativa')->find($id);
        $subdependencias = Dependencia::where('subdependencia','=',1)->where('parent_id','=',$inspector->dependencia_id)->get();
        $cargos = Cargo::get();
        return view('inspectores.edit',compact('inspector','cargos','subdependencias'));

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
