<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherAttributesToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombres',120)->nullable();
            $table->string('apellidos',45)->nullable();
            /* $table->unsignedBigInteger('dependencia_id')->nullable(); */
            $table->foreignId('dependencia_id','fk_users_tblc_dependencias')->constrained('tblc_dependencias');
            $table->string('area_laboral',45)->nullable();
            $table->longText('img_avatar')->nullable();
            $table->integer('is_admin')->nullable()->default(0);
            /* $table->unsignedBigInteger('user_created')->nullable();
            $table->unsignedBigInteger('user_update')->nullable(); */
            $table->foreignId('user_created','fk_users_users')->constrained('users');
            $table->foreignId('user_update','fk_users_users2')->constrained('users');
            $table->integer('estatus_is')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
