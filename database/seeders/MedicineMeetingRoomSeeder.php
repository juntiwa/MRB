<?php

namespace Database\Seeders;

use App\Models\MedicineMeetingRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineMeetingRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      MedicineMeetingRoom::seed(storage_path('app/seeders/medicine_meeting_rooms.csv'));

    }
}
