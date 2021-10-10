<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->integer('menu_id');
            $table->integer('ver')->nullable()->default(0);
            $table->integer('agregar')->nullable()->default(0);
            $table->integer('editar')->nullable()->default(0);
            $table->integer('eliminar')->nullable()->default(0);
            $table->integer('impresion')->nullable()->default(0);
            $table->integer('exportar')->nullable()->default(0);
            $table->integer('validar')->nullable()->default(0);
            $table->integer('estatus')->nullable()->default(0);
            $table->unsignedBigInteger('user_created')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_menus');
    }
}
