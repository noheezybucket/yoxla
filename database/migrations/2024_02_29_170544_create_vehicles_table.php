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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned()->nullable();
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->integer('seats');
            $table->integer('daily_price');
            $table->integer('hourly_price');
            $table->dateTime('purchase_date');
            $table->bigInteger('origin_mileage')->default(0);
            $table->bigInteger('actual_mileage')->nullable();
            $table->bigInteger('registration')->unique();
            $table->json('photos');
            $table->enum('gearbox', ['auto', 'manual']);
            $table->enum('type', ['bus', 'truck', 'berline']);
            $table->enum('status', ['available', 'breakdown', 'unavailable']);
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
