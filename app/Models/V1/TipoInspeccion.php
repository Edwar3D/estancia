<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class TipoInspeccion extends Model
{
    protected $table = 'tbl_tipos_inspeccion';

    public function ordenes () {
        return $this->hasMany(Orden::class);
    }

}
