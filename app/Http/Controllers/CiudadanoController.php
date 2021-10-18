<?php

namespace App\Http\Controllers;

use App\Models\V1\Dependencia;
use App\Models\V1\Inspector;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CiudadanoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dependencias = DB::table('tblc_dependencias')->get();
        $inspectores = Inspector::paginate(10);
        $inspector = Inspector::find($inspectores[0]->id);
        $dependencia = Dependencia::find($inspector->dependencia_id);
        return view('layouts.ciudadano', ['dependencias'=>$dependencias,
                    'inspectores'=>$inspectores,'inspector'=>$inspector,
                    'dependencia'=>$dependencia,'options'=>$dependencias]);
    }

    public function showInspector($id)
    {
        $inspector = Inspector::find($id);
        $dependencia = Dependencia::find($inspector->dependencia_id);
        return view('components.view_inspector',['inspector'=>$inspector,'dependencia'=>$dependencia]);
    }

    public function searchInspector(Request $request)
    {
        $validatedData = $request->validate([
            'nameInspector' => 'required|string|max:255',
        ]);
        return view('components.view_inspector');
    }

    public function selectDependencia($id)
    {
        if($id <= 0){
            $dependencias =  DB::table('tblc_dependencias')->get();
            $inspectores = Inspector::paginate(10);
        }else{
            $dependencias= Dependencia::where('id','=', $id)->get();
            $inspectores = Inspector::where('dependencia_id','=', $id)->paginate(2);
            $inspectores->withPath('/ciudadano');
        }

        return view('components.table_inspectores',compact('dependencias','inspectores'));
    }

    public function messages()
    {
        return [
            'nameInspector' => 'Ingrese un nombre válido',
         ];
    }

}
