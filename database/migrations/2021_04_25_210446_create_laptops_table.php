<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('laptops', function (Blueprint $table) {
            $table->id();

            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('num_serie',50);
            $table->string('procesador',50);
            $table->string('sistema_operativo',50);
            $table->string('antivirus',50);
            $table->string('color',20)->nullable();
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}

