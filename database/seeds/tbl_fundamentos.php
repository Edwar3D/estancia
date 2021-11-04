<?php

use App\Models\V1\FundamentoJuridico;
use Illuminate\Database\Seeder;

class tbl_fundamentos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FundamentoJuridico::class, 10)->create();
    }
}
