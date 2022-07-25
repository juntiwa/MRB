<?php

namespace App\Imports;

use App\Models\MedicineMeetingRoom;
use Maatwebsite\Excel\Concerns\ToModel;

class MedicineMeetingRoomsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicineMeetingRoom($row);
      /* return new MedicineMeetingRoom([
         'name' => $row['name'],
         'short_name' => $row['short_name'],
         'minimum_attendees' => $row['minimum_attendees'],
         'maximum_attendees' => $row['maximum_attendees'],
         'advance_booking_under_days' => $row['advance_booking_under_days'],
         'location' => $row['location'],
         'images ' => $row['images'],
         
     ]); */
    }
}
