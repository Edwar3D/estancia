<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDocumentosOrden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tipos_documentos', function (Blueprint $table) {
            $table->id();
            $table->text('tipo');
            $table->timestamps();
        });

        Schema::create('tbl_documentos_orden', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->foreignId('tipo_id')->constrained('tbl_tipos_documentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('orden_id')->constrained('tbl_ordenes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_documentos_orden');
        Schema::dropIfExists('tbl_tipos_documentos');
    }
}
