<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class tbl_menusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_menus')->insert([
            'menu' => 'Dependencias',
            'clave' => '',
            'estatus' => 1,
            'sub_menu' => 0,
            'orden' =>1,
        ]);
        DB::table('tbl_menus')->insert([
            'menu' => 'Crear',
            'clave' => 'dependencias/create',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 1,
            'orden' =>1,
        ]);
        DB::table('tbl_menus')->insert([
            'menu' => 'lista',
            'clave' => 'dependencias',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 1,
            'orden' =>1,
        ]);
    }
}
