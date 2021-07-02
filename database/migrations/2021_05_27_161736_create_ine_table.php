<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ine', function (Blueprint $table) {
            $table->id();
            $table->string('clave_elector',20);
            $table->string('curp',20);
            $table->string('anio_registro',5);
            $table->date('nacimiento');
            $table->string('seccion',6);
            $table->string('vigencia',10);
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
        Schema::dropIfExists('ine');
    }
}
