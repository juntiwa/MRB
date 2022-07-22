<?php

namespace Database\Seeders;

use App\Models\DivisionMeetingRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionMeetingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DivisionMeetingRoom::seed(storage_path('app/seeders/division_meeting_rooms.csv'));
    }
}
