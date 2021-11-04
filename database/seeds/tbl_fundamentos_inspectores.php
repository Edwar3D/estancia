<?php

use Illuminate\Database\Seeder;

class tbl_fundamentos_inspectores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FundamentosInspectores::class,100)->create();
    }
}
