<?php

namespace App\Models\V1;
use Illuminate\Database\Eloquent\Model;
use DB;

class Usuario extends Model
{
    //
    protected $table = 'users';

    protected $fillable = ['username','email', 'nombres', 'apellidos', 'created_at','updated_at','updated_at','updated_at','estatus_id'];

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, "estatus_id");
    }


    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, "dependencia_id");
    }

    public function arealaboral()
    {
        return $this->belongsTo(Dependencia::class, "area_laboral");
    }

    public function update_privilleges($data,$UserPrivilleges){
        try {

        DB::table('users_menus')->where('user_id',$UserPrivilleges)->delete();

        DB::table('users_menus')->insert($data);

        $message = 'Almacenado con éxito';
        return ['success' => true,'message' => $message];
        } catch(\Exception $e){
           // do task when error
           //return $e->getMessage();   // insert query
            //return "Error al Guardar los datos";
            return ['success' => false,'message' => $e->getMessage()];
        }
    }
}
