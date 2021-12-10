<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrdenesFundamentosOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ordenes_fundamentos_ordenes', function (Blueprint $table) {
            $table->foreignId('orden_id')->constrained('tbl_ordenes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fundamento_id')->constrained('tbl_fundamentos_orden')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ordenes_fundamentos_ordenes');
    }
}
