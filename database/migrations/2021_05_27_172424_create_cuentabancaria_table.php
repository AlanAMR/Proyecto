<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentabancariaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentabancaria', function (Blueprint $table) {
            $table->id();
            $table->string('banco',30);
            $table->string('titular',255);
            $table->string('clabe',20);
            $table->string('comprobante',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentabancaria');
    }
}
