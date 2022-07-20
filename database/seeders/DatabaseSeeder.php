<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Division;
use App\Models\MedicineMeetingRoom;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
      
        Department::create([
         'name_th' => 'med',
         'name_short_th' => 'med',
         'name_en' => 'med',
         'name_short_en' => 'med',
        ]);

        Division::create([
         'name_th' => 'วักกะ',
         'name_short_th' => 'วักกะ',
         'name_en' => 'วักกะ',
         'name_short_en' => 'วักกะ',
         'department_id' => '1'
        ]);
        
        User::create([
         'login' => 'test1',
         'password' => '1234',
         'org_id' => '12345678',
         'full_name' => 'foo bar',
         'division_id' => '1',
        ],
        [
         'login' => 'test2',
         'password' => '1234',
         'org_id' => '12345678',
         'full_name' => 'approve bar',
         'division_id' => '1',
        ]);

        MedicineMeetingRoom::seed(storage_path('app/seeders/medicine_meeting_rooms.csv'));
    }
}
