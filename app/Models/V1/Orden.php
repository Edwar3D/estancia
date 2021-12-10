<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'tbl_ordenes';

    public function fundamentos(){
        return $this->belongsToMany(FundamentoOrden::class, 'tbl_ordenes_fundamentos_ordenes',
        'fundamento_id','orden_id' )
        ->wherePivot('fundamento_id','orden_id');
    }

    public function documentos(){
        return $this->hasMany(DocumentoOrden::class);
    }

}
