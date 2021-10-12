<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('folio',7)->unique();
            $table->integer('tipo');
            $table->string('dirreccion',250);
            $table->integer('zona');
            $table->string('archivo');
            $table->integer('estado_actual');
            $table->date('fecha');
            $table->foreignId('inspector_id','fk_tbl_ordenes_tbl_inspectores')->constrained('tbl_inspectores');
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
        Schema::dropIfExists('tbl_ordenes');
    }
}
