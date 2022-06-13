<?php

namespace App\Http\Controllers;

use App\Imports\MedicineMeetingRoomsImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MedicineMeetingRoomController extends Controller
{
    public function index()
    {
        return view('medicine');
    }

    public function import()
    {
      //   Log::info('Ok');
        Excel::import(new MedicineMeetingRoomsImport, request()->file('file'));

        return back();
    }
}
