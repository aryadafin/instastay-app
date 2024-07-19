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
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('proof');
            $table->date('checkin_at');
            $table->date('checkout_at');
            $table->unsignedBigInteger('total_days');
            $table->unsignedBigInteger('total_amount');
            $table->foreignId('user_id')->constrained()->onDelete('Cascade');
            $table->foreignId('hotel_id')->constrained()->onDelete('Cascade');
            $table->boolean('is_paid');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_bookings');
    }
};
