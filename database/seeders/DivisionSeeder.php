<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Division::seed(storage_path('app/seeders/divisions.csv'));

      $divisions = [
         [
            'name_th' => 'สาขาวิชาต่อมไร้ท่อและเมตะบอลิสม',
            'name_short_th' => 'ต่อมไร้ท่อ',
            'name_en' => 'Division of Endocrine & Metabolism',
            'name_short_en' => '',
            'department_id' => '1',
         ],
         [
            'name_th' => 'สาขาวิชาโรคติดเชื้อและอายุรศาสตร์เขตร้อน',
            'name_short_th' => 'ติดเชื้อ',
            'name_en' => 'Division of Infectious Diseases and Tropical Medicine',
            'name_short_en' => '',
            'department_id' => '1',
         ]
      ];
      foreach ($divisions as $division) {
         Division::create($division);
     }
    }
}
