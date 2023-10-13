<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // toyota, ford, etc
            $table->string('model');    // corolla, mustang, etc
            $table->integer('year');    // 2010, 2015, etc
            $table->decimal('price')->default(0.0); // price per day
            $table->string('color');    // color of the car
            $table->string('photo')->nullable(); // Add the 'photo' field (nullable)
            $table->string('license_plate');    // License plate number
            // Add other columns as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
