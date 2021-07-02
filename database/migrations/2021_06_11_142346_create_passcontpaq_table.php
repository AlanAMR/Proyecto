<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasscontpaqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passcontpaq', function (Blueprint $table) {
            $table->id();
            $table->integer('empleado_id')->nullable();
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
        Schema::dropIfExists('passcontpaq');
    }
}
