<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsivasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsivas', function (Blueprint $table) {
            
            $table->id();
            
            $table->foreignId('usuario_solicita')->constrained('users');

            $table->foreignId('usuario_autoriza')->constrained('users');

            $table->foreignId('usuario_entrega')->constrained('users');
            
            $table->timestamp('created_at')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->tinyInteger('status')->default(1);
            $table->boolean('pdf_generado')->default(false);
            $table->boolean('archivos_subidos')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsivas');
    }
}
