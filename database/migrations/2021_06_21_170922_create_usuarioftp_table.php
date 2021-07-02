<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioftpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioftp', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conexion_id')->nullable()->constrained('conexionesftp');
            $table->string('identificador',50);
            $table->string('usuario',100);
            $table->string('password',550);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarioftp');
    }
}