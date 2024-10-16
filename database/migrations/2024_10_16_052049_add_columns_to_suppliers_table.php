<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->string('name')->after('id'); // Columna para el nombre del proveedor
            $table->string('email')->unique()->after('name'); // Columna para el email
            $table->string('phone')->nullable()->after('email'); // Columna para el teléfono
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropColumn(['name', 'email']);
        });
    }
};
