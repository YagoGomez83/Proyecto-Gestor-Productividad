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
        Schema::create('sub__police_movement_code', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('police_movement_code_id');
            $table->foreign('police_movement_code_id')->references('id')->on('police_movement_code')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub__police_movement_code');
    }
};
