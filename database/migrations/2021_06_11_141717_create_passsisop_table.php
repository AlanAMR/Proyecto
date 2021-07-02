<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasssisopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passsisop', function (Blueprint $table) {
            $table->id();
            $table->integer('equipo_id')->nullable();
            $table->tinyinteger('tipo')->default('0');
            $table->string('sistema',50);
            $table->string('identificador',50);
            $table->string('usuario',50);
            $table->string('password',510);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passsisop');
    }
}
