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
            $table->text('description')->nullable();  // Descripción del evento (opcional)
            $table->date('event_date');  // Fecha del evento
            $table->timestamps();  // Timestamps automáticos (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');  // Eliminar la tabla si existe
    }
};
