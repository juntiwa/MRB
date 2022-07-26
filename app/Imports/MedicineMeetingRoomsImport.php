<?php

namespace App\Imports;

use App\Models\MedicineMeetingRoom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MedicineMeetingRoomsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MedicineMeetingRoom($row);
    }
}
