<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tbl_zonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_zonas')->insert([
            'zona'=>'Norte Oriente',
        ]);
        DB::table('tbl_zonas')->insert([
            'zona'=>'Norte Poniente',
        ]);
        DB::table('tbl_zonas')->insert([
            'zona'=>'Sur Oriente',
        ]);
        DB::table('tbl_zonas')->insert([
            'zona'=>'Sur Poniente',
        ]);
    }
}
