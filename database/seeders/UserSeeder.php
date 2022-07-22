<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users =[
         [
            'login' => 'test1',
            'password' => '1234',
            'org_id' => '12345678',
            'full_name' => 'foo bar',
            'division_id' => '1',
         ],
         [
          'login' => 'test2',
          'password' => '1234',
          'org_id' => '12345679',
          'full_name' => 'approve bar',
          'division_id' => '1',
         ]
      ];

      foreach($users as $user){
         User::create($user);
      }
    }
}
