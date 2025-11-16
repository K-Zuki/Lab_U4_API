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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Para pruebas funcionales (requerido, longitud)
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2); // Para pruebas funcionales (numérico, > 0)
            $table->integer('stock'); // Para pruebas funcionales (numérico, > 0)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};