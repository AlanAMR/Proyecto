<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->string('pais',100);
            $table->string('ciudad',100);
            $table->string('estado',100);
            $table->string('codigo_postal',8);
            $table->string('zona',100);
            $table->string('calle',100);
            $table->string('numero_exterior',6);
            $table->string('numero_interior',3)->nullable();
            $table->string('comprobante',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccion');
    }
}
