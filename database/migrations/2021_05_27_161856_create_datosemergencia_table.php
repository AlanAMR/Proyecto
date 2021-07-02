<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosemergenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datosemergencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->string('telefono',15);
            $table->string('parentesco',20);
            $table->string('nombre',20);
            $table->string('direccion',255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datosemergencia');
    }
}
