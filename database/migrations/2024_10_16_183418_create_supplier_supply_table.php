<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierSupplyTable extends Migration
{
    public function up()
    {
        Schema::create('supplier_supply', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->foreignId('supply_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 8, 2); // Ajusta según necesites
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supplier_supply');
    }
}
