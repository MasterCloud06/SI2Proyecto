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
        Schema::create('supplier_supply', function (Blueprint $table) {
            $table->id(); // ID único para la tabla de unión
            $table->unsignedBigInteger('supplier_id'); // Llave foránea para supplier
            $table->unsignedBigInteger('supply_id'); // Llave foránea para supply
            $table->integer('quantity')->nullable(); // Cantidad opcional
            $table->decimal('amount', 8, 2)->nullable(); // Permitir nulos en 'amount'
            $table->timestamps(); // created_at y updated_at

            // Definimos las llaves foráneas
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');

            // Opcional: índice único para evitar duplicados de una misma combinación supplier-supply
            $table->unique(['supplier_id', 'supply_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_supply');
    }
};
