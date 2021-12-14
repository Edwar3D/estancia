<?php


namespace App\Models\V1;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'tbl_zonas';

    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
