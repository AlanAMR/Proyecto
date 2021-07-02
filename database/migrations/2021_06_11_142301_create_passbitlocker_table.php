<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassbitlockerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passbitlocker', function (Blueprint $table) {
            $table->id();
            $table->integer('equipo_id')->nullable();
            $table->tinyinteger('tipo')->default('0');
            $table->string('identificador',50);
            $table->string('clave',50);
            $table->string('clave_recuperacion',510);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passbitlocker');
    }
}
