<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConexionsmtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conexionesmtp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servidor_id')->nullable()->constrained('servidores');
            $table->string('identificador',50);
            $table->string('dominio',255);
            $table->string('protocolo_acceso',10);
            $table->string('servidor_entrante',255);
            $table->string('servidor_saliente',255);
            $table->integer('puerto_entrada');
            $table->integer('puerto_salida');
            $table->string('cifrado_entrante',12);
            $table->string('cifrado_saliente',12);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conexionesmtp');
    }
}
