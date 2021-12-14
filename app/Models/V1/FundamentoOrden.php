<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class FundamentoOrden extends Model
{
    protected $table = 'tbl_fundamentos_orden';

    public function ordenes(){
        return $this->belongsToMany(Orden::class,'tbl_ordenes_fundamentos_ordenes',
        'orden_id','fundamento_id')
        ->wherePivot('orden_id','fundamentos_id');
    }
}
