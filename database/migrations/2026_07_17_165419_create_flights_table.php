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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('travel_id');
            $table->string('name');
            $table->string('transport_name');
            $table->string('departure_country');
            $table->string('arrival_country');
            $table->string('departure_city');
            $table->string('arrival_city');
            $table->datetime('departure_date');
            $table->datetime('arrival_date');
            $table->string('departure_airport');
            $table->string('arrival_airport');
            $table->boolean('luggage_included');
            $table->integer('luggage_max_weight')->nullable();
            $table->integer('luggage_width')->nullable();
            $table->integer('luggage_height')->nullable();
            $table->integer('luggage_length')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
