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

    public function estatus(){
        return $this->belongsTo(Estatus::class,'estatus_id');
    }

    public function tipo(){
        return $this->belongsTo(TipoInspeccion::class,'tipo_id');
    }

    public function dependencia (){
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }

    public function zona(){
        return $this->belongsTo(Zona::class, 'zona_id');
    }

}
