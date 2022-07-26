<?php

namespace App\Imports;

use App\Models\DivisionMeetingRoom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DivisionMeetingRoomsImport implements ToModel, WithHeadingRow
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
