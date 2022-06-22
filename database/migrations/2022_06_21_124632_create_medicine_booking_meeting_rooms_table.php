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
            $table->string('name_coordinate');
            $table->timestamp('start');
            $table->timestamp('end');
            $table->json('equipment');
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
