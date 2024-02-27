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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('avatar')->nullable();
            $table->integer('years_of_xp');
            $table->integer('avg_rating')->default(0);
            $table->bigInteger('license_number');
            $table->bigInteger('phonenumber');
            $table->enum('license_category', ['A', 'B', 'AB']);
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->date('license_emission_date');
            $table->date('license_expiration_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
