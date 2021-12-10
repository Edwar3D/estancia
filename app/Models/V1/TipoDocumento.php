<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tbl_tipos_documentos';

    public function documentos()
    {
        return $this->hasMany(DocumentoOrden::class);
    }
}
