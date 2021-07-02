<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacionacademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacionacademica', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleado');
            $table->string('tipo',50);
            $table->string('valor',255);
            $table->string('comprobante',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formacionacademica');
    }
}
