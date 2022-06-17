<?php

namespace App\Http\Controllers\Medicines;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicineMeetingRoomController extends Controller
{
    public function index()
    {
        return view('medicine');
    }

    //  public function store()
   //  {
   //    //   Log::info('Ok');
   //      Excel::import(new MedicineMeetingRoomsImport, request()->file('file'));
   //      return back();
   //  }
}
