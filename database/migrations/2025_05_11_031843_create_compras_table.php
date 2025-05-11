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
            $table->id();
            $table->unsignedBigInteger('distribuidor_id'); // Relación con el distribuidor
            $table->unsignedBigInteger('producto_id'); // Relación con el producto
            $table->integer('cantidad'); // Cantidad comprada
            $table->decimal('precio_total', 10, 2); // Precio total de la compra
            $table->timestamps();

            $table->foreign('distribuidor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
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
