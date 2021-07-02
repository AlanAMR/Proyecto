<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConexionessmbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conexionessmb', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servidor_id')->nullable()->constrained('servidores');
            $table->string('identificador',50);
            $table->string('servidor',255);
            $table->integer('puerto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conexionessmb');
    }
}
