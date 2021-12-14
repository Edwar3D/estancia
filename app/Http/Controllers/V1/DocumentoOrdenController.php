<?php


namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\V1\DocumentoOrden;
use App\Models\V1\Orden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentoOrdenController extends Controller
{
    public function store(Request $request)
    {
        try {
            if ($request->hasFile('file')) {
                $orden = Orden::all();
                $orden = $orden->last()->id;
                //nombre del archivo orden_id+tipo_doc+nombreDoc
                $path = $request->file('file')->storeAs('ordenes-documentos', $orden . $request["tipo"] . $request->file('file')->getClientOriginalName(), 'public');

                $newDoc = new DocumentoOrden;
                $newDoc->tipo_id = $request["tipo"];
                $newDoc->url = $path;
                $newDoc->orden_id = $orden;

                $newDoc->save();

                $response = [
                    'success' => true,
                    'message' => 'Archivo almacenado con éxito',
                    'data' => $newDoc->id
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Archivo No encontrado'
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response);
    }


    public function destroy($id)
    {
        try {
            $doc = DocumentoOrden::find($id);
            Storage::delete('public/' . $doc->url);
            $message = 'Archivo eliminado';
            $response = [
                'success' => true,
                'message' => $message,
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($response);
    }

    public function show($id)
    {
        $doc = DocumentoOrden::find($id);
        if (Storage::exists('public\\' . $doc->url)) {
            $storage =  Storage::path('public\\' . $doc->url);
            return response()->file($storage);
        } else {
            return response()
                ->view('errors.404', 404);
        }
    }
}
