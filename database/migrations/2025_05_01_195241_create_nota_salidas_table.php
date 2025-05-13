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
        Schema::create('nota_salidas', function (Blueprint $table) {
            $table->id("codigo");
            $table->unsignedInteger("cantidad");
            $table->dateTime("fechaHora");

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
        Schema::dropIfExists('nota_salidas');
    }
};
