<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOrigenesInspeccionInspectores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_origenes_inspeccion_inspectores', function (Blueprint $table) {
            $table->foreignId('origen_id','fk_tbl_origenes_inspeccion_inspectores_tbl_origenes')->constrained('tbl_origenes_inspeccion');
            $table->foreignId('inspector_id','fk_tbl_origenes_inspeccion_inspectores_tbl_inspector')->constrained('tbl_inspectores');
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
        Schema::dropIfExists('tbl_origenes_inspeccion_inspectores');
    }
}
