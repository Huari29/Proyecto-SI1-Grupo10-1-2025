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
        Schema::create('contienes', function (Blueprint $table) {
            $table->unsignedBigInteger('codigoProducto');     // FK a ordens
            $table->unsignedBigInteger('codigoIngrediente');  // FK a productos
            $table->unsignedInteger("cantidad");
            $table->string("unidad", 10);

            // Clave primaria compuesta
            $table->primary(['codigoProducto', 'codigoIngrediente']);

            // Claves foráneas
            $table->foreign('codigoProducto')->references('codigo')->on('productos')->onDelete('cascade');
            $table->foreign('codigoIngrediente')->references('codigo')->on('ingredientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contienes');
    }
};
