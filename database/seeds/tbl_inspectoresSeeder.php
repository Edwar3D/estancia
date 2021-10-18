<?php

use App\Models\V1\Inspector;
use Illuminate\Database\Seeder;

class tbl_inspectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Inspector::class, 30)->create();
    }
}
