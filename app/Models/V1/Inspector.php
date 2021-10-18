<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Inspector extends Model
{
    protected $table = 'tbl_inspectores';


    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }

}
