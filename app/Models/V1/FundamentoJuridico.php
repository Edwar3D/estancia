<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class FundamentoJuridico extends Model
{
    protected $table = 'tbl_fundamentos';

    public function inspectores(){
        return $this->belongsToMany(Inspector::class, 'tbl_fundamentos_inspectores','inspector_id','fundamento_id',)
        ->withPivot( 'inspector_id','fundamento_id',)
        ->withTimestamps();
    }
}
