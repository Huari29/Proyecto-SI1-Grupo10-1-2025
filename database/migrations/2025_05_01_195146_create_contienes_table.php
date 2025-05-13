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
            $table->unsignedBigInteger('codigoProductos');     // FK a ordens
            $table->unsignedBigInteger('codigoIngredientes');  // FK a productos
            $table->unsignedInteger("cantidad");
            $table->string("unidad", 10);

            // Clave primaria compuesta
            $table->primary(['codigoProductos', 'codigoIngredientes']);

            // Claves foráneas
            $table->foreign('codigoProductos')->references('codigo')->on('productos')->onDelete('cascade');
            $table->foreign('codigoIngredientes')->references('codigo')->on('ingredientes')->onDelete('cascade');

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
