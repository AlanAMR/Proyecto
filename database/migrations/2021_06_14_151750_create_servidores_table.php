<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servidores', function (Blueprint $table) {
            $table->id();
            $table->string('identificador',50);
            $table->string('num_serie',50);
            $table->tinyinteger('tipo');
            $table->tinyinteger('propietario');
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('almacenamiento',10);
            $table->string('ram',10);
            $table->string('procesador',50);
            $table->string('sistema_operativo',50);
            $table->string('antivirus',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servidores');
    }
}
