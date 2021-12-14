<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    //

    protected $table = 'tbl_estatus_ordenes';
    public $timestamps= false;


    public function estatus()
    {
        return $this->hasMany(Orden::class);
    }
}
