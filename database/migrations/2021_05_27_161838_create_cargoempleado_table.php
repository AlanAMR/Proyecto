<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoempleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargoempleado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->string('cargo',100);
            $table->decimal('sueldo', 8, 2);
            $table->date('comienzo');
            $table->date('finaliza')->nullable();
            $table->string('horario',100);
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
        Schema::dropIfExists('cargoempleado');
    }
}
