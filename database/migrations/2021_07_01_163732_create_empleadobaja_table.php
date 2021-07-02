<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadobajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleadobaja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->nullable()->constrained('empleado');
            $table->foreignId('empresa_id')->nullable()->constrained('empresas');
            $table->string('clave_empleado',10)->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->integer('lote_imss')->nullable();
            $table->tinyInteger('periodo')->nullable();
            $table->string('parametro',12)->nullable();
            $table->integer('sparh')->nullable();
            $table->string('paterno',50)->nullable();
            $table->string('materno',50)->nullable();
            $table->string('nombre',50)->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('nss',20)->nullable();
            $table->string('motivo_baja',100)->nullable();
            $table->string('registro_patronal',20)->nullable();
            $table->tinyInteger('clase')->nullable();
            $table->string('observaciones',255)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleadobaja');
    }
}
