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
            'clave' => 'dependencias',
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
            'sub_menu' => 0,
            'parentid' => null,
            'orden' =>1,

        ]);
        //2
        DB::table('tbl_menus')->insert([
            'menu' => 'Usuarios',
            'clave' => 'usuarios',
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
            'sub_menu' => 0,
            'parentid' => null,
            'orden' =>2,
        ]);
        //3
        DB::table('tbl_menus')->insert([
            'menu' => 'Inspecciones',
            'clave' => 'ordenes',
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
            'sub_menu' => 0,
            'parentid' => null,
            'orden' =>3,
        ]);
        //4
        DB::table('tbl_menus')->insert([
            'menu' => 'Inspectores',
            'clave' => 'inspectores',
            'ver'=>1,
            'agregar'=>1,
            'editar'=>1,
            'eliminar'=>1,
            'impresion'=>1,
            'exportar'=>1,
            'validar'=>1,
            'estatus'=>1,
            'sub_menu' => 0,
            'parentid' => null,
            'orden' =>4,
        ]);


    }
}
