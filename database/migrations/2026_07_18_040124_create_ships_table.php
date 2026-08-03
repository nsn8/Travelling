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
        Schema::create('ships', function (Blueprint $table) {
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
            $table->string('departure_port');
            $table->string('arrival_port');
            $table->string('deck_number')->nullable();
            $table->string('cabin_number')->nullable();
            $table->string('place_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ships');
    }
};
