<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu',120)->nullable();
            $table->string('clave',80);
            $table->integer('ver')->default(0)->nullable();
            $table->integer('agregar')->default(0)->nullable();
            $table->integer('eliminar')->default(0)->nullable();
            $table->integer('impresion')->default(0)->nullable();
            $table->integer('exportar')->default(0)->nullable();
            $table->integer('validar')->default(0)->nullable();
            $table->integer('estatus')->default(0)->nullable();
           /*  $table->integer('parent_id')->default(0); */
            $table->foreignId('parent_id', 'fk_tbl_menus_tbl_menus')->nullable()->constrained('tbl_menus');
            $table->integer('sub_menu')->default(0)->nullable();
            $table->string('descripcion',120)->nullable();
            $table->string('icono',30)->nullable();
            $table->integer('orden')->nullable();
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
        Schema::dropIfExists('tbl_menus');
    }
}
