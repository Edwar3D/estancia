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
        //USUARIO ADMIN Y MENUS
        $this->call(usersSeeder::class);
        $this->call(tbl_menusSeeder::class);
        $this->call(users_menusSeeder::class);

        //DATOS DE DEPENDENCIAS
        $this->call(tblc_dependenciasSeeder::class);

        ///DATOS DE INSPECTORES
        $this->call(tbl_cargos::class);
        $this->call(tbl_inspectoresSeeder::class);

        //Ordenes
        //$this->call(tbl_zonasSeeder::class);
        //$this->call(tbl_ordenesSeeder::class);

    }
}
