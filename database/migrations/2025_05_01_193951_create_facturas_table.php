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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id("codigoControl");
            $table->decimal("monto",10,2)->unsigned();
            $table->dateTime("fechaHora");

            $table->unsignedBigInteger('idNotaVenta');
            $table->foreign('idNotaVenta')->references('id')->on('nota_ventas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
