<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\V1\FundamentoOrden;
use App\Models\v1\FundamentosOrden;
use App\Models\V1\Orden;

class FundamentoOrdenController extends Controller
{

    public function index()
    {
        //devolver todos los fundamentos de las ordenes
        $fundamentos = FundamentoOrden::get();
        $response = [
            'success' => true,
            'data' => $fundamentos
        ];
        return response()->json($response);
    }


    public function store(Request $request)
    {
        //agregar un nuevo fundamento
        try {
            $newFundamento =  new FundamentoOrden;
            $newFundamento->fundamento =  $request['fundamento'];
            $newFundamento->url =  $request['url'];
            $newFundamento->save();
            $message = 'Almacenado con éxito';
            $response = [
                'success' => true,
                'message' => $message,
                'data' => $newFundamento
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($response);
    }

    public function addFundamentosOrden(Request $request)
    {
        //registrar fundamentos junto con el inspector
        try {
            $orden = Orden::find($request['request']['id_orden']);
            foreach ($request['request']['fundamentos'] as $key => $value) {
                $orden->fundamentos()->attach($orden->id, ['fundamento_id' => $value]);
            }
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

    public function getFundamentosByOrden($id)
    {
        //devolver los fundamentos de una orden
        try {
            $fundamentosOrden = FundamentosOrden::where('orden_id', '=', $id);
            $response = [
                'success' => true,
                'data' => $fundamentosOrden
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'data' => $e->getMessage()
            ];
        }
        return response()->json($response);
    }
}
