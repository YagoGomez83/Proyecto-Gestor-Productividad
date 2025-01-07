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
        Schema::create('role_permission', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' que es clave primaria, autoincremental.

            $table->unsignedBigInteger('role_id'); // Crea una columna 'role_id' para asociar un rol.
            $table->foreign('role_id') // Define 'role_id' como clave foránea.
                ->references('id') // Apunta a la columna 'id' de la tabla 'roles'.
                ->on('roles') // Especifica la tabla relacionada ('roles').
                ->onDelete('cascade'); // Si se elimina un 'role', elimina sus asociaciones en 'role_permission'.

            $table->unsignedBigInteger('permission_id'); // Crea una columna 'permission_id' para asociar un permiso.
            $table->foreign('permission_id') // Define 'permission_id' como clave foránea.
                ->references('id') // Apunta a la columna 'id' de la tabla 'permissions'.
                ->on('permissions') // Especifica la tabla relacionada ('permissions').
                ->onDelete('cascade'); // Si se elimina un 'permission', elimina sus asociaciones en 'role_permission'.

            $table->timestamps(); // Añade columnas 'created_at' y 'updated_at'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission');
    }
};
