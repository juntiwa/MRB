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
            $table->foreignId('meeting_room_id');
            $table->foreign('meeting_room_id')->references('id')->on('medicine_meeting_rooms');
            $table->unsignedSmallInteger('attendees');
            $table->foreignId('requester_id');
            $table->foreign('requester_id')->references('id')->on('users');
            $table->string('name_coordinate')->nullable();
            $table->json('equipment')->nullable();
            $table->unsignedTinyInteger('status')->default(1); // booked, approved, disapproved, canceled
            $table->string('reason')->nullable();
            $table->foreignId('approver_id')->nullable();
            $table->foreign('approver_id')->references('id')->on('users');
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
