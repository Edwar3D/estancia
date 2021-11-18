<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\FundamentoInspector;
use App\Models\V1\FundamentoJuridico;
use App\Models\V1\Inspector;

class FundamentoInspectorController extends Controller
{
    public function index(){
        //devolver todos los fundamentos de los inspectores
        $fundamentos = FundamentoJuridico::get();
        $response=[
            'success'=> true,
            'de'=>0,
            'data' => $fundamentos,
        ];
        return response()->json($response);
    }

    public function getByInspector($id){
        //devolver los fundamentos de un inspector
        $fundamentosInspector = FundamentoInspector::select('fundamneto_id')->where('inspector_id','=',$id)->get();
        return response()->json($fundamentosInspector);
    }

    public function store (Request $request){
        //agregar un nuevo fundamento
        try{
            $newFundamento =  new FundamentoJuridico;
            $newFundamento->fundamento =  $request["fundamento"];
            $newFundamento->url =  $request["url"];
            $newFundamento->save();
            $message = 'Almacenado con éxito';
            return ['success' => true,'message' => $message];
        } catch(\Exception $e){
            return ['success' => false,'message' => $e->getMessage()];
        }
    }

    public function addFundamentosInspector (Request $request){
        //registrar fundamentos junto con el inspector
        try{
            $inspector = Inspector::find($request['request']['inspector']);
             foreach ($request['request']['fundamentos'] as $key => $value) {
                $inspector->fundamentos()->attach( $inspector->id,['fundamento_id'=> $value]);
            }
            $message = 'Almacenado con éxito';
            return ['success' => true,'message' => $message];
        } catch(\Exception $e){
            return ['success' => false,'message' => $e->getMessage()];
        }
    }
}
