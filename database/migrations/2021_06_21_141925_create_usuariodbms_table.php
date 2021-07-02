<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariodbmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariodbms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dbms_id')->nullable()->constrained('conexiondbms');
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
        Schema::dropIfExists('usuariodbms');
    }
}
