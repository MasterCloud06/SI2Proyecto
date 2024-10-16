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
        Schema::create('events', function (Blueprint $table) {
            $table->id();  // ID del evento
            $table->string('name');  // Nombre del evento
            $table->text('description')->nullable();  // Descripción del evento
            $table->date('event_date');  // Fecha del evento
            $table->string('location')->nullable();  // Ubicación del evento
            $table->integer('capacity')->nullable();  // Capacidad máxima
            $table->string('category');  // Categoría del evento
            $table->decimal('price', 8, 2)->default(0);  // Precio del evento
            $table->string('image_path')->nullable();  // Nombre del archivo de la imagen
            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
