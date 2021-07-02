<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariovpnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuariovpn', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conexion_id')->nullable()->constrained('conexionesvpn');
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
        Schema::dropIfExists('usuariovpn');
    }
}
