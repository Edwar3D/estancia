<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cargos', function (Blueprint $table) {
            $table->id();
            $table->string('cargo');
            $table->timestamps();
        });
        Schema::create('tbl_inspectores', function (Blueprint $table) {
            $table->id();
            $table->string('numero_empleado',8)->unique();
            $table->string('nombre');
            $table->string('apellidos');
            $table->foreignId('cargo_id','fk_inspentores_tblc_cargos')->constrained('tbl_cargos');
            $table->string('jefe');
            $table->bigInteger('telefono');
            $table->string('email');
            $table->integer('estado_actual')->default(0);
            $table->longText('foto');
            $table->foreignId('area_administrativa','fk_inspentores_tblc_dependencias')->nullable()->constrained('tblc_dependencias');
            $table->foreignId('dependencia_id','fk_inspentores_tblc_dependencias2')->constrained('tblc_dependencias');
            $table->foreignId('user_created')->constrained('users');
            $table->foreignId('user_updated')->constrained('users');

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
        Schema::dropIfExists('tbl_inspectores');
        Schema::dropIfExists('tbl_cargos');
    }
}
