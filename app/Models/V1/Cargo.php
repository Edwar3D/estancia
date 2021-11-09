<?php

namespace App\Models\V1;

use App\Models\V1\Inspector;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'tbl_cargos';

    public function inspectores(){
        return $this->hasMany(Inspector::class);
    }
}
