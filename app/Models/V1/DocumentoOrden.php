<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class DocumentoOrden extends Model
{

    protected $table = 'tbl_documentos_orden';

    public function tipo(){
        return $this->belongsTo(TipoDocumento::class, 'tipo_id');
    }

    public function Orden(){
        return $this->belongsTo(Orden::class, 'orden_id');
    }

}
