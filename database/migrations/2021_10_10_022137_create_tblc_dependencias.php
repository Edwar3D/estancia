<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcDependencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tblc_dependencias', function (Blueprint $table) {
            $table->id();
            $table->string('dependencia',180)->nullable();
            $table->string('responsable',200)->nullable();
            $table->string('direccion',255)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('ext')->nullable();
            $table->string('email')->nullablfke();
            $table->integer('subdependencia')->nullable();
            $table->foreignId('parent_id','fk_tblc_dependencias_tblc_dependencias1_idx')->default(0)->constrained('tblc_dependencias')->onDelete('cascade');
            $table->integer('nivel')->nullable();
            $table->foreignId('user_created','fk_tblc_dependencias_users')->default(0)->constrained('users');
            $table->foreignId('user_update','fk_tblc_dependencias_users2')->default(0)->constrained('users');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tblc_dependencias');
    }
}
