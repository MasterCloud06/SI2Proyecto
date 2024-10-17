<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliesTable extends Migration
{
    public function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); // Campo para el nombre del suministro
            $table->integer('quantity')->nullable(); // Permitir nulos en 'quantity'
            $table->decimal('amount', 8, 2); // Monto del suministro
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplies');
    }
}
