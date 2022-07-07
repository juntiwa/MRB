<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->unsignedTinyInteger('minimum_attendees');
            $table->unsignedSmallInteger('maximum_attendees');
            $table->unsignedSmallInteger('advance_booking_under_days');
            $table->string('location');
            $table->json('images');
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
        Schema::dropIfExists('medicine_meeting_rooms');
    }
};
