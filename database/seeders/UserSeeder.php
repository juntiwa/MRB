<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'ok' => true,
            'found' => true,
            'login' => 'juntima.nuc',
            'password' => Hash::make('secret'),
            'org_id' =>  '100' . random_int(10000, 99999),
            'full_name' => 'น.ส. จันทิมา นุชโยธิน',
            'full_name_en' => 'Miss JUNTIMA NUCHYOTIN',
            'position_name' => 'นักวิชาการคอมพิวเตอร์',
            'division_name' => 'ภ.อายุรศาสตร์',
            'department_name' => 'ภ.อายุรศาสตร์',
            'office_name' => 'สนง.ภาควิชาอายุรศาสตร์',
            'email' => 'juntima.nuc@gmail.com',
            'password_expires_in_days' => random_int(20, 90),
            'remark' => 'สนง.ภาควิชาอายุรศาสตร์ ภ.อายุรศาสตร์',
            'name' => 'น.ส. จันทิมา นุชโยธิน',
            'name_en' => 'Miss JUNTIMA NUCHYOTIN',
            'reply_code' => 0,

        ]);
    }
}
