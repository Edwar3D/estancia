<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersActividad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_actividad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id','fk_users_actividad_users')->constrained('users');
            $table->string('accion',65)->nullable()->default(null);
            $table->string('descripcion',200)->nullable()->default(null);
            $table->text('detalles')->nullable()->default(null);
            $table->string('icono',20)->nullable()->default(null);
            $table->string('color_mensaje',20)->nullable()->default(null);
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
        Schema::dropIfExists('users_actividad');
    }
}
