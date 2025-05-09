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
            $table->id();
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('ingredientes')->nullable();
            $table->text('beneficios')->nullable();
            $table->decimal('precio_unitario', 10, 2);
            $table->decimal('precio_mayorista', 10, 2)->nullable();
            $table->string('imagen')->nullable(); // Ruta al archivo
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
