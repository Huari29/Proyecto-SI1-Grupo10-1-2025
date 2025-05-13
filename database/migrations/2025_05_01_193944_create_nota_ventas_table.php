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
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->id();
            $table->string("tipoPago", 20);
            $table->boolean("pagado");
            $table->dateTime("fechaHora");
            $table->decimal("total",10,2)->unsigned();

            $table->unsignedBigInteger('nroMesa');
            $table->foreign('nroMesa')->references('nro')->on('mesas')->onDelete('cascade');

            $table->unsignedBigInteger('idEnvios');
            $table->foreign('idEnvios')->references('id')->on('envios')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_ventas');
    }
};
