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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('date');
            $table->string('time');
            $table->string('description');
            $table->string('name');
            $table->string('title');
            $table->string('doctor')->nullable();
=======
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('description')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
>>>>>>> parent of fa270ac (add doctors to appoinment)
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
