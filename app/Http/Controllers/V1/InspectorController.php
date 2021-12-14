<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\V1\Cargo;
use App\Models\V1\Dependencia;
use App\Models\V1\FundamentoJuridico;
use App\Models\V1\Inspector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!isset($request["act"])) {
            return view('inspectores.list');
        } else {
            if ($request['search'] == '') {
                $search = '';
                $inspectores = Inspector::with('dependencia')->with('areaadministrativa')
                    ->where('estado_actual', '=', 1)
                    ->where('dependencia_id', '=', Auth::user()->dependencia_id)
                    ->paginate(100);
            } else {
                $inspectores = Inspector::with('dependencia')->with('areaadministrativa')
                    ->where('estado_actual', '=', 1)
                    ->where('dependencia_id', '=', Auth::user()->dependencia_id)
                    ->where('numero_empleado', 'like', "%{$request['search']}%")
                    ->orwhere('nombre', 'like', "%{$request['search']}%")
                    ->orwhere('apellidos', 'like', "%{$request['search']}%")->paginate(100);
                $search = $request['search'];
            }

            $response = [
                're' => $search,
                'success' => true,
                'html' => view('inspectores.data.tabla-inspectores', compact('inspectores', 'search'))->render()
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
        $dependencia_items = Dependencia::where('subdependencia', '=', 0)->get();
        $cargos = Cargo::get();
        $fundamentos = FundamentoJuridico::get();
        return view('inspectores.add', compact('cargos', 'dependencia_items', 'fundamentos'));
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
            $newInspector =  new Inspector;

            $data = file_get_contents($request["foto_perfil"]);

            $newInspector->numero_empleado =  $request["numero_empleado"];
            $newInspector->nombre =  $request["nombre"];
            $newInspector->apellidos =  $request["apellidos"];
            $newInspector->cargo_id =  $request["cargo"];
            $newInspector->dependencia_id = $request["dependencia_id"];
            $newInspector->area_administrativa =  $request["subdependencia_id"];
            $newInspector->jefe =  $request["jefe"];
            $newInspector->email =  $request["correo"];
            $newInspector->telefono =  $request["telefono"];
            $newInspector->foto  = 'data:image/png;base64,' . base64_encode($data);

            $newInspector->user_created = Auth::user()->id;
            $newInspector->user_updated = Auth::user()->id;
            $newInspector->estado_actual =  1;
            $newInspector->save();
            $message = 'Almacenado con éxito';
            $response = [
                'success' => true,
                'message' => $message,
                'id' => $newInspector->id
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
    public function show($id, Request $request)
    {
        try {
            $html = '';
            $opc = '';

            $inspector = Inspector::with('cargo')->with('dependencia')->with('areaadministrativa')->find($id);

            if ($request['request']['opc'] == 'preview') {
                $opc = 'preview';
                $html = view('ordenes.data.preview-inspector', compact('inspector'))->render();
            }

            $response = [
                'success' => true,
                'opc' => 'preview',
                'html' => $html,
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
            ];
        }

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dependencia_items = Dependencia::where('subdependencia', '=', 0)->get();
        $inspector = Inspector::with('dependencia')->with('areaadministrativa')->with('fundamentos')->find($id);
        $cargos = Cargo::get();
        return view('inspectores.edit', compact('inspector', 'cargos', 'dependencia_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $inspector = Inspector::find($id);
            if ($request["foto_perfil"] != null) {
                $data = file_get_contents($request["foto_perfil"]);
                $inspector->foto  = 'data:image/png;base64,' . base64_encode($data);
            }

            $inspector->numero_empleado =  $request["numero_empleado"];
            $inspector->nombre =  $request["nombre"];
            $inspector->apellidos =  $request["apellidos"];
            $inspector->cargo_id =  $request["cargo"];
            $inspector->dependencia_id = $request["dependencia_id"];
            $inspector->area_administrativa =  $request["subdependencia_id"];
            $inspector->jefe =  $request["jefe"];
            $inspector->email =  $request["correo"];
            $inspector->telefono =  $request["telefono"];
            $inspector->user_updated = Auth::user()->id;
            $inspector->updated_at =  date('Y-m-d H:i:s');

            $inspector->save();
            $message = 'Datos del inspector actualizado';
            $response = [
                'success' => true,
                'message' => $message,
                're' => $request->all()
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e,
                're' => $request->all()
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
            $obj_tabla = Inspector::find($id);

            $obj_tabla->estado_actual = 0;
            $obj_tabla->updated_at =  date('Y-m-d H:i:s');
            $obj_tabla->user_updated = Auth::user()->id;

            $obj_tabla->save();
            $message = 'Inspector Eliminado';
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
}
