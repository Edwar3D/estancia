<?php

use App\Models\V1\Orden;
use Illuminate\Database\Seeder;

class tbl_ordenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Comment= factory(Orden::class, 150)->create();
    }
}
