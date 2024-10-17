<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('name', 255); // Nombre del proveedor
            $table->string('email', 255)->unique(); // Correo del proveedor, único
            $table->string('phone', 50)->nullable(); // Teléfono (opcional)
            $table->text('description')->nullable(); // Descripción del proveedor
            $table->decimal('total_amount', 10, 2)->default(0); // Monto total de los suministros
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers'); // Eliminar la tabla si existe
    }
}
