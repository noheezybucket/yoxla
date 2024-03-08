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
            $table->bigInteger('vehicle_id')->unsigned();
            $table->bigInteger('distance')->default(0);
            $table->bigInteger('price')->default(0);
            $table->string('client_fullname');
            $table->bigInteger('client_phonenumber');
            $table->string('starting_point');
            $table->string('ending_point');
            $table->dateTime('starting_date');
            $table->dateTime('ending_date');
            $table->enum('rent_type', ['daily', 'hourly']);
            $table->enum('payment_method', ['mobile', 'cash']);
            $table->enum('status', ['pending', 'paid']);
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->cascadeOnUpdate()->cascadeOnDelete();
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
