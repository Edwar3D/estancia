<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLogsErrorSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_logs_error_system', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id','fk_logs_error_system_users')->constrained('users');
            $table->string('tipo_error',120)->nullable()->default(null);
            $table->longText('descripcion')->nullable()->default(null);
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
        Schema::dropIfExists('tbl_logs_error_system');
    }
}
