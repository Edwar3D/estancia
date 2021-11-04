<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_cargos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_cargos')->insert([
            'cargo'=>'Supervisor',
        ]);
        DB::table('tbl_cargos')->insert([
            'cargo'=>'Inspector',
        ]);
        DB::table('tbl_cargos')->insert([
            'cargo'=>'Verificador',
        ]);
    }
}
