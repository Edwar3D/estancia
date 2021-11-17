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
        Schema::create('tbl_ordenes_fundamentos_orden', function (Blueprint $table) {
            $table->foreignId('inspector_id')->constrained('tbl_inspectores');
            $table->foreignId('fundamento_id')->constrained('tbl_fundamentos_orden');
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
        Schema::dropIfExists('tbl_ordenes_fundamentos_orden');
    }
}
