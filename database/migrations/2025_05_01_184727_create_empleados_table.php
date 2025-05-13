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
        Schema::create('empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('id'); // Usamos el mismo campo 'id' de persona como clave primaria
            $table->string('direccion');

            // Establecer la clave primaria (id) y la clave foránea a personas
            $table->primary('id'); // Usamos la misma clave primaria
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
