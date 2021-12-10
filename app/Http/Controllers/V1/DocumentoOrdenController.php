<?php


namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\V1\DocumentoOrden;
use App\Models\V1\Orden;
use App\Models\V1\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoOrdenController extends Controller
{
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {

                $path = $request->file('file')->storeAs('ordenes-documentos', $request->file('file')->getClientOriginalName(), 'public');
                //$storage = Storage::path('public\\'. $path );

                $newDoc = new DocumentoOrden;
                $newDoc->tipo_id = $request["tipo"];
                $newDoc->url = $path;
                $orden = Orden::all();
                $orden = $orden->last()->id;

                $newDoc->orden_id = $orden;
                $newDoc->save();


                $tiposDocumento = tipoDocumento::get();
                $documentosSubidos = DocumentoOrden::where('orden_id', '=', $orden)->orderBy('tipo_id', 'DESC')->get();

                return response()->json([
                    'success' => true,
                    'message' => 'Archivo almacenado con éxito',
                    'HTML' => view('ordenes.add-documentos',compact('tiposDocumento','documentosSubidos'))->render()
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Archivo No encontrado'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function index(Request $request)
    {
        $orden = Orden::find(4);
        return $orden->pivot;
    }
    /*   public function store (Request $request){
       try {
            //code...
        } catch (\Exception $e) {

        }

         $path = null;
        if($request->hasFile('file')){
            $path = $request->file('file')->storeAs('ordenes-documentos', 'new.pdf', 'public');
        }
        $storage = Storage::path('public\\'. $path );

        return response()->file($storage);

        return ['success'=> true, 'data'=>$request["file"]];
    }*/
}
