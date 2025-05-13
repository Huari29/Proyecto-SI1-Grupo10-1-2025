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
        Schema::create('ordenas', function (Blueprint $table) {
            $table->unsignedBigInteger('nroOrdens');     // FK a ordens
            $table->unsignedBigInteger('codigoProductos');  // FK a productos
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio', 10, 2)->unsigned();

            // Clave primaria compuesta
            $table->primary(['nroOrdens', 'codigoProductos']);

            // Claves foráneas
            $table->foreign('nroOrdens')->references('nro')->on('ordens')->onDelete('cascade');
            $table->foreign('codigoProductos')->references('codigo')->on('productos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenas');
    }
};
