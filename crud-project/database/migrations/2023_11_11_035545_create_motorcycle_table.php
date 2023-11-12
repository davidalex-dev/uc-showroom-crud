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
        Schema::create('motorcycle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicleID')->unsigned();
            $table->string('trunkSize', 255);
            $table->integer('petrolCapacity');
            $table->foreign('vehicleID')->references('id')->on('vehicle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcycle');
    }
};
