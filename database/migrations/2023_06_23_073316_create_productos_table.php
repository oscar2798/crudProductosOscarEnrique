<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
             // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('sku');
            $table->decimal('precioDolares',10,2);
            $table->decimal('precioPesos',10,2);
            $table->integer('puntos');
            $table->boolean('activo');
            $table->boolean('eliminado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
