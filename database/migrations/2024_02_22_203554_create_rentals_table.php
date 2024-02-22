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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned();
            $table->bigInteger('vehicle_id')->unsigned();
            $table->bigInteger('distance');
            $table->bigInteger('price');
            $table->string('client_fullname');
            $table->bigInteger('client_phonenumber');
            $table->string('starting_point');
            $table->string('ending_point');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->enum('rent_type', ['journaliere', 'horaire']);
            $table->enum('payment_method', ['mobile', 'cash']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
