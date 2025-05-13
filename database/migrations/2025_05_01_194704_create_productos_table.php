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
            $table->unsignedBigInteger('codigo'); // Usamos el mismo campo 'codigo' de persona como clave primaria
            $table->decimal("precio",10,2)->unsigned();

            // Establecer la clave primaria (codigo) y la clave foránea a personas
            $table->primary('codigo'); // Usamos la misma clave primaria
            $table->foreign('codigo')->references('codigo')->on('items')->onDelete('cascade');

            $table->unsignedBigInteger("codigoTipo");
            $table->foreign("codigoTipo")->references('codigo')->on('tipos')->onDelete('cascade');

            $table->unsignedBigInteger("idSabor");
            $table->foreign("idSabor")->references('id')->on('sabors')->onDelete('cascade');

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
