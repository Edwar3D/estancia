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
            $table->foreignId('fundamento_id','fk_tbl_fundamentos_inspectores_tbl_inspectores')->constrained('tbl_inspectores');
            $table->foreignId('inspector_id','fk_tbl_fundamentos_inspectores_tbl_fundamentos')->constrained('tbl_fundamentos');
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
        Schema::dropIfExists('tbl_fundamentos_inspectores');
    }
}
