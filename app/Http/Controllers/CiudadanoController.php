<?php

namespace App\Http\Controllers;

use App\Models\V1\Dependencia;
use App\Models\v1\FundamentosInspector;
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

    public function index(Request $request)
    {
        $options = DB::table('tblc_dependencias')->get();
        if ($request['select_dependencia'] == '' && $request['search'] == '') {
            $dependencias = $options;
            $inspectores = Inspector::with('cargo')->paginate(50);
        } else if ($request['select_dependencia'] == 0) {
            $dependencias =  DB::table('tblc_dependencias')->get();

            if ($request['search'] != '')
                $inspectores = Inspector::where('nombre', 'like', "%{$request['search']}%")->paginate(50);
            else
                $inspectores = Inspector::paginate(50);

        } else {
            $dependencias = Dependencia::where('id', '=', $request['select_dependencia'])->get();
            $inspectores = Inspector::where('dependencia_id', '=', $request['select_dependencia'])
                ->where('nombre', 'like',  "%{$request['search']}%")->paginate(50);
        }

        if (sizeof($inspectores) != 0) {
            $inspector = Inspector::find($inspectores[0]->id);
            $dependencia = Dependencia::find($inspector->dependencia_id);
        } else {
            $inspector = [];
            $dependencia = [];
        }

        $count = sizeof($inspectores);
        $inspectores->withPath("/ciudadano?select_dependencia={$request['select_dependencia']}&search={$request['search']}");

        return view('ciudadano.tabla_inspectores', compact('options', 'inspectores', 'dependencias', 'inspector', 'dependencia', 'request', 'count'));
    }

    public function viewInspector($id)
    {
        $inspector = Inspector::with('dependencia')->with('areaadministrativa')->with('fundamentos')->find($id);
        $fundamentos = FundamentosInspector::where('inspector_id', '=', $id)->get();
        return view('ciudadano.view_inspector', compact('inspector', 'fundamentos'));
    }
}
