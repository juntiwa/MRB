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
        Schema::create('medicine_booking_meeting_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('comment')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->unsignedSmallInteger('meeting_room_id');
            $table->unsignedSmallInteger('attendees');
            $table->string('name_coordinate')->nullable();
            $table->json('equipment')->nullable();
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
        Schema::dropIfExists('medicine_booking_meeting_rooms');
    }
};
