<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'soy Prueba',
            'email' => 'soyprueba@ejemplo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$fUSO2YiqGHwheEx.JRzFCOSw109.XKat283e7idMfVifhpuIj/0PG', // prueba123
            'remember_token' => Str::random(10),
            'nombres'=>'nombre1 nombre2',
            'apellidos' =>'apellido1 apellido2',
            'area_labora' =>'comunicación',
            'dependencia_id'=>1,
            'user_created'=>1,
            'user_update'=>1
        ]);
    }
}
