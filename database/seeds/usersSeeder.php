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
            'username' => 'Admin',
            'email' => 'soyprueba@ejemplo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$fUSO2YiqGHwheEx.JRzFCOSw109.XKat283e7idMfVifhpuIj/0PG', // prueba123
            'remember_token' => Str::random(10),
            'nombres'=>'Eduardo Admin',
            'apellidos' =>'Diaz DIAZ',
            'area_laboral' =>null,
            'dependencia_id'=>null,
            'user_created'=>null,
            'user_updated'=>null,
            'is_admin'=>1,
            'estatus'=>1
        ]);
    }
}
