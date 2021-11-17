<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\FundamentoInspector;
use App\Models\V1\FundamentoJuridico;

class FundamentoInspectorController extends Controller
{
    public function index(){
        $fundamentos = FundamentoJuridico::get();
        $response=[
            'success'=> true,
            'de'=>0,
            'data' => $fundamentos,
        ];
        return response()->json($response);
    }

    public function store (Request $request){
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
        try{
            foreach ($request['request']['fundamentos'] as $key => $value) {
                $newFundamento =  new FundamentoInspector;
                $newFundamento->fundamento_id = $value;
                $newFundamento->inspector_id = $request['request']['inspector'];
                $newFundamento->save();
            }
            $message = 'Almacenado con éxito';
            return ['success' => true,'message' => $message];
        } catch(\Exception $e){
            return ['success' => false,'message' => $e->getMessage()];
        }
    }
}
