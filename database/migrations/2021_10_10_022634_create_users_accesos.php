<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAccesos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_accesos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id','fk_users_actividad_users')->constrained('users');
            $table->foreignId('dependencia_id','fk_users_accesos_tblc_dependencias')->constrained('tblc_dependencias');
            $table->text('agente')->nullable()->default(null);
            $table->string('ip_address',45)->nullable()->default(null);
            $table->string('comentario',120)->nullable()->default(null);
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
        Schema::dropIfExists('users_accesos');
    }
}
