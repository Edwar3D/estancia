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
            $table->string('nombre',250);
            $table->foreignId('cargo_id','fk_inspentores_tblc_cargos')->constrained('tbl_cargos');
            $table->string('jefe',250);/*diferente del encargado de dependencia?*/
            $table->string('telefono',45);
            $table->string('email');
            $table->integer('estado_actual')->default(0);
            $table->longText('foto');/*como se guarda */
            $table->String('area_administrativa')->nullable();
            $table->foreignId('dependencia_id','fk_inspentores_tblc_dependencias')->constrained('tblc_dependencias');
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
        Schema::dropIfExists('tbl_inspectores');
        Schema::dropIfExists('tbl_cargos');
    }
}
