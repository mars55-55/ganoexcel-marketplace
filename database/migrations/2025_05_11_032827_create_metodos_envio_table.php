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
        Schema::create('metodos_envio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del método de envío
            $table->decimal('costo', 10, 2); // Costo del envío
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metodos_envio');
    }
};
