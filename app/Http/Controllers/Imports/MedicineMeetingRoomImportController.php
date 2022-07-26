<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use App\Imports\MedicineMeetingRoomsImport;
use App\Models\MedicineMeetingRoom;
use Maatwebsite\Excel\Facades\Excel;

class MedicineMeetingRoomImportController extends Controller
{
    public function __invoke()
    {
        Excel::import(new MedicineMeetingRoomsImport, request()->file('medicine_file'));

        return back();
    }
}
