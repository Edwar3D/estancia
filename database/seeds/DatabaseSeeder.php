<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(tbl_menusSeeder::class);
         $this->call(usersSeeder::class);
         $this->call(users_menusSeeder::class);
    }
}
