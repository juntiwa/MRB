<?php

namespace App\Imports;

use App\Models\DivisionMeetingRoom;
use Maatwebsite\Excel\Concerns\ToModel;

class DivisionMeetingRoomsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new DivisionMeetingRoom($row);
    }
}
