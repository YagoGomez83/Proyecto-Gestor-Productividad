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
        Schema::table('services', function (Blueprint $table) {
            // Agregar la columna 'police_movement_code_id'
            $table->unsignedBigInteger('police_movement_code_id')->nullable();

            // Crear la clave foránea
            $table->foreign('police_movement_code_id')->references('id')->on('police_movement_code')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Eliminar la clave foránea y la columna
            $table->dropForeign(['police_movement_code_id']);
            $table->dropColumn('police_movement_code_id');
        });
    }
};
