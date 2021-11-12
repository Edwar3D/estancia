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
        //1
        DB::table('tbl_menus')->insert([
            'menu' => 'Dependencias',
            'clave' => '',
            'estatus' => 1,
            'sub_menu' => 0,
            'orden' =>1,
        ]);
        //2
        DB::table('tbl_menus')->insert([
            'menu' => 'Crear',
            'clave' => 'dependencias/create',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 1,
            'orden' =>1,
        ]);
        //3
        DB::table('tbl_menus')->insert([
            'menu' => 'lista',
            'clave' => 'dependencias',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 1,
            'orden' =>1,
        ]);
        //4
        DB::table('tbl_menus')->insert([
            'menu' => 'Usuarios',
            'clave' => '',
            'estatus' => 1,
            'sub_menu' => 0,
            'orden' =>1,
        ]);
        //5
        DB::table('tbl_menus')->insert([
            'menu' => 'Crear',
            'clave' => 'usuarios/create',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 4,
            'orden' =>1,
        ]);
        //6
        DB::table('tbl_menus')->insert([
            'menu' => 'lista',
            'clave' => 'usuarios',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 4,
            'orden' =>1,
        ]);
        //7
        DB::table('tbl_menus')->insert([
            'menu' => 'Inspecciones',
            'clave' => '',
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => 0,
            'orden' =>1,
        ]);
        //8
        DB::table('tbl_menus')->insert([
            'menu' => 'Informes',
            'clave' => 'inspecciones',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 7,
            'orden' =>1,
        ]);
        //9
        DB::table('tbl_menus')->insert([
            'menu' => 'Generar Orden',
            'clave' => 'inspeccion/create',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 7,
            'orden' =>1,
        ]);
        //10
        DB::table('tbl_menus')->insert([
            'menu' => 'Inspectores',
            'clave' => '',
            'estatus' => 1,
            'sub_menu' => 0,
            'parentid' => 0,
            'orden' =>1,
        ]);

        //11
        DB::table('tbl_menus')->insert([
            'menu' => 'Modificar',
            'clave' => 'inspectores',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 10,
            'orden' =>1,
        ]);
        //12
        DB::table('tbl_menus')->insert([
            'menu' => 'Alta',
            'clave' => 'inspectores/create',
            'estatus' => 1,
            'sub_menu' => 1,
            'parentid' => 10,
            'orden' =>2,
        ]);

    }
}
