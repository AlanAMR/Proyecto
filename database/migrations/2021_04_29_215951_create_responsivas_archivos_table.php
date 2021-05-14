<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsivasArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsivas_archivos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('responsiva_id')->constrained('responsivas');
            $table->string('nombre',255);
            $table->string('ruta',255);
            $table->tinyInteger('tipo')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsivas_archivos');
    }
}
