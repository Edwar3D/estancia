<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users_menusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=12; $i++){
            DB::table('users_menus')->insert([
                'user_id'=>1,
                'menu_id'=>$i,
                'user_created'=>1,
            ]);
        }

    }
}
