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
            $table->foreignId('dependencia_id','fk_users_tblc_dependencias')->nullable()->constrained('tblc_dependencias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('area_laboral','fk_users_tblc_dependencias2')->nullable()->constrained('tblc_dependencias');
            $table->longText('img_avatar')->nullable();
            $table->integer('is_admin')->default(0);
            $table->foreignId('user_created','fk_users_users')->nullable()->constrained('users');
            $table->foreignId('user_updated','fk_users_users2')->nullable()->constrained('users');
            $table->integer('estatus')->default(0);
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
