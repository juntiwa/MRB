<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use App\Imports\MedicineMeetingRoomsImport;
use Maatwebsite\Excel\Facades\Excel;

class MedicineMeetingRoomController extends Controller
{
    public function __invoke()
    {
        Excel::import(new MedicineMeetingRoomsImport, request()->file('file'));

        return back();
    }
}
