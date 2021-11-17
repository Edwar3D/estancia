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
        Schema::create('tbl_zonas', function (Blueprint $table) {
            $table->id();
            $table->string('zona');
            $table->timestamps();
        });
        Schema::create('tbl_tipos_inspeccion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->timestamps();
        });
        Schema::create('tbl_estatus_ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('estatus');
            $table->timestamps();
        });
        Schema::create('tbl_ordenes', function (Blueprint $table) {
            $table->id();
            $table->string('folio',7)->unique();
            $table->text('direccion');
            $table->foreignId('estatus_id','fk_ordenes_tbl_estatus_ordenes')->constrained('tbl_estatus_ordenes');
            $table->date('fecha');
            $table->foreignId('tipo_id','fk_ordenes_tbl_zonas')->constrained('tbl_tipos_inspeccion');
            $table->foreignId('zona_id','fk_tbl_orden_tbl_zonas')->constrained('tbl_zonas');
            $table->foreignId('inspector_id','fk_tbl_ordenes_tbl_inspectores')->constrained('tbl_inspectores');
            $table->foreignId('dependencia_id','fk_tbl_ordenes_tblc_dependencias')->constrained('tblc_dependencias');
            $table->foreignId('user_created','fk_tbl_ordenes_users')->default(0)->constrained('users');
            $table->foreignId('user_updated','fk_tbl_ordenes_users2')->default(0)->constrained('users');

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
        Schema::dropIfExists('tbl_zonas');
        Schema::dropIfExists('tbl_tipos_inspeccion');
        Schema::dropIfExists('tbl_estatus_ordenes');
    }
}
