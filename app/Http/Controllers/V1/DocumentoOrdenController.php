<?php


namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentoOrdenController extends Controller
{
    public function store (Request $request){
        try{
           $newFile = $request->file('file')->store('public');
            return dd($request);
        }catch(\Exception $e){
            return dd($e);
        }
    }
}
