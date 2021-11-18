<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Inspector extends Model
{
    protected $table = 'tbl_inspectores';

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function dependencia(){
        return $this->belongsTo(Dependencia::class,'dependencia_id');
    }
    public function areaadministrativa(){
        return $this->belongsTo(Dependencia::class,'area_administrativa');
    }
    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
    public function fundamentos(){
        return $this->belongsToMany(FundamentoJuridico::class, 'tbl_fundamentos_inspectores','fundamento_id','inspector_id')
        ->withPivot('fundamento_id', 'inspector_id')
        ->withTimestamps();
    }

}
