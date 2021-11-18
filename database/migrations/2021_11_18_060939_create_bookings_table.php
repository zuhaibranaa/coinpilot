<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slot_id');
            $table->foreign('slot_id')->references('id')->on('slots');
            $table->boolean('is_dex');
            $table->boolean('is_nft');
            $table->boolean('is_coin');
            $table->boolean('is_promotion');
            $table->boolean('is_image');
            $table->decimal('slot_price');
            $table->decimal('paid_price');
            $table->string('image')->default(null);
            $table->date('booking_from');
            $table->date('booking_to');
            $table->unsignedBigInteger('booked_by');
            $table->foreign('booked_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
