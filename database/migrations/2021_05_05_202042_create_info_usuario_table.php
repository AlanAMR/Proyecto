<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_usuario', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('usuario_id')->constrained('users');

            $table->string('num_empleado',50)->nullable();
            $table->string('num_personal',50)->nullable();
            $table->string('departamento',50)->nullable();
            $table->string('ubicacion',50)->nullable();
            $table->string('correo_asignado',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_info_usuario');
    }
}
