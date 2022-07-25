<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use App\Imports\DivisionMeetingRoomsImport;
use Maatwebsite\Excel\Facades\Excel;

class DivisionMeetingRoomController extends Controller
{
    public function __invoke()
    {
        Excel::import(new DivisionMeetingRoomsImport, request()->file('file'));

        return back();
    }
}
