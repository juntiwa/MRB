<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Division;
use App\Models\DivisionMeetingRoom;
use App\Models\MedicineMeetingRoom;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
         DepartmentSeeder::class,
         DivisionSeeder::class,
         UserSeeder::class,
         MedicineMeetingRoomSeeder::class,
         DivisionMeetingRoomSeeder::class
     ]);
      
    }
}
