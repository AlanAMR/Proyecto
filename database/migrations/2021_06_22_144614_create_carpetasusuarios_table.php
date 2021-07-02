<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetasusuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetasusuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('carpeta_id')->nullable()->constrained('carpetas');
            $table->foreignId('usuarioras_id')->nullable()->constrained('usuarioras');
            $table->foreignId('empleado_id')->nullable()->constrained('empleado');
            $table->string('permisos',4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpetasusuarios');
    }
}
