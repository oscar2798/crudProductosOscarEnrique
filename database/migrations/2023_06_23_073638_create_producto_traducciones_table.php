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
        Schema::create('producto_traducciones', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('producto_id')->unsigned();
            $table->string('nombre');
            $table->string('descripcion_corta');
            $table->string('descripcion_larga');
            $table->string('url');
            $table->string('idioma');
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos');  // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_traducciones');
    }
};
