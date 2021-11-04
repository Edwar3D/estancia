<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_tipos_inspeccion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_tipos_inspeccion')->insert([
            'tipo'=>'Tipo A',
        ]);
        DB::table('tbl_tipos_inspeccion')->insert([
            'tipo'=>'Tipo B',
        ]);
        DB::table('tbl_tipos_inspeccion')->insert([
            'tipo'=>'Tipo C',
        ]);
        DB::table('tbl_tipos_inspeccion')->insert([
            'tipo'=>'Tipo D',
        ]);
    }
}
