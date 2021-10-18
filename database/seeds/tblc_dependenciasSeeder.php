<?php

use App\Models\V1\Dependencia;
use Illuminate\Database\Seeder;

class tblc_dependenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Comment= factory(Dependencia::class, 9)->create();
    }
}
