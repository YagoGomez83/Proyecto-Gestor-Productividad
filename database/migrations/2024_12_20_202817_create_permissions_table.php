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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' que es clave primaria, autoincremental.
            $table->string('name'); // Crea una columna 'name' para almacenar el nombre del permiso, como "crear servicio" o "ver reportes".
            $table->timestamps(); // Añade columnas 'created_at' y 'updated_at' para gestionar las fechas de creación y modificación del registro.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permissions');
    }
};
