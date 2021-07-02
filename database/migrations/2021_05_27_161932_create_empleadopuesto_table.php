<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadopuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadopuesto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->foreignId('horario_id')->constrained('horarios');
            $table->foreignId('puesto_id')->constrained('puestos');
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleadopuesto');
    }
}
