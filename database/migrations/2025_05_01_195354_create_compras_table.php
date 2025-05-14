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
        Schema::create('compras', function (Blueprint $table) {
            $table->id("nro");
            $table->decimal("costo",10,2)->unsigned();
            $table->decimal("cantidad",10,2)->unsigned();

            
            $table->unsignedBigInteger("IdNotaCompra");
            $table->foreign("IdNotaCompra")->references("id")->on("nota_compras")->onDelete("cascade");

            $table->unsignedBigInteger("codigoItem");
            $table->foreign("codigoItem")->references("codigo")->on("items")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
