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
        Schema::create('ordens', function (Blueprint $table) {
            $table->unsignedBigInteger('nro'); // en lugar de 'id'
            $table->date("fechaOrden");
            $table->decimal("subTotal",10,2)->unsigned();

            $table->primary("nro");
            $table->foreign("nro")->references('id')->on('nota_ventas')->onDelete('cascade');

            $table->unsignedBigInteger("idCliente");
            $table->foreign("idCliente")->references('id')->on('clientes')->onDelete('cascade');

            $table->unsignedBigInteger("idEmpleado");
            $table->foreign("idEmpleado")->references('id')->on('empleados')->onDelete('cascade');

            $table->unsignedBigInteger("idEstadoOrden");
            $table->foreign("idEstadoOrden")->references('id')->on('estado_ordens')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
