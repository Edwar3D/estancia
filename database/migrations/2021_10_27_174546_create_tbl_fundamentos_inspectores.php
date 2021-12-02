<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFundamentosInspectores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fundamentos_inspectores', function (Blueprint $table) {
            $table->foreignId('fundamento_id')->constrained('tbl_fundamentos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('inspector_id')->constrained('tbl_inspectores')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_fundamentos_inspectores');
    }
}
