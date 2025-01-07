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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['operator', 'supervisor', 'coordinator'])->default('operator');
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            // $table->unsignedBigInteger('city_id');
            // $table->foreign('city_id')->references('id')->on('cities');
            // $table->unsignedBigInteger('center_id');
            // $table->foreign('center_id')->references('id')->on('centers');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
