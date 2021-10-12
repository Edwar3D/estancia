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
        Schema::create('tbl_inspectores', function (Blueprint $table) {
            $table->id();
            $table->string('numero_empleado',8)->unique();
            $table->string('nombre',250);
            $table->integer('cargo');
            $table->string('jefe',250);/*diferente del encargado de dependencia?*/
            $table->string('telefono',45);
            $table->string('mail');
            $table->integer('estado_actual')->default(0);
            $table->longText('foto');/*como se guarda */
            $table->text('area_administrativa')->nullable();/*si son textos*/
            $table->text('fundamentos_juridicos')->nullable();
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
    }
}
