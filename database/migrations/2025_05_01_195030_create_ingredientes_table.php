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
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo'); // Usamos el mismo campo 'codigo' de persona como clave primaria

            // Establecer la clave primaria (codigo) y la clave foránea a personas
            $table->primary('codigo'); // Usamos la misma clave primaria
            $table->foreign('codigo')->references('codigo')->on('items')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredientes');
    }
};
