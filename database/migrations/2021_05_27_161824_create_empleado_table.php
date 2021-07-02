<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ine_id')->constrained('ine');
            $table->string('rfc',15);
            $table->foreignId('direccion_id')->constrained('direccion');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('banco_id')->constrained('cuentabancaria');
            $table->string('clave',10)->unique();
            $table->string('nombre',255);
            $table->tinyInteger('edad');
            $table->string('telefono1',14)->nullable();
            $table->string('telefono2',14)->nullable();
            $table->string('correo',255);
            $table->string('nss',20)->nullable();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
