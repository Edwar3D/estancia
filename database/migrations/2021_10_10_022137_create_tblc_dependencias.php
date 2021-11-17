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
            $table->string('dependencia');
            $table->string('responsable');
            $table->text('direccion');
            $table->bigInteger('telefono');
            $table->string('ext')->nullable();
            $table->string('email');
            $table->integer('subdependencia')->default(0);
            $table->foreignId('parent_id','fk_tblc_dependencias_tblc_dependencias1_idx')->nullable()->constrained('tblc_dependencias')->onDelete('cascade');
            $table->integer('nivel')->nullable();
            $table->integer('estatus')->default(0);
            $table->foreignId('user_created','fk_tblc_dependencias_users')->constrained('users');
            $table->foreignId('user_updated','fk_tblc_dependencias_users2')->constrained('users');
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
