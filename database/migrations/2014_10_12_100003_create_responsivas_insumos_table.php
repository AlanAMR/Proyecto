<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsivasInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsivas_insumos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('responsiva_id')->constrained('responsivas');
            $table->foreignId('responsiva_movimiento_id')->constrained('responsivas_movimientos');
            $table->foreignId('tipo_insumo_id')->constrained('tipos_insumos');
            
            $table->integer('insumo_id');
            $table->mediumText('comentarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsivas_insumos');
    }
}
