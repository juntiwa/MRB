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

    }
}
