<?php

namespace App\Http\Controllers\Medicines;

use App\Http\Controllers\Controller;
use App\Models\MedicineMeetingRoom;
use Illuminate\Http\Request;

class MedicineMeetingRoomController extends Controller
{
    public function index()
    {
        $medicines = MedicineMeetingRoom::get();

        return view('medicine', compact('medicines'));
    }

    //  public function store()
   //  {
   //    //   Log::info('Ok');
   //      Excel::import(new MedicineMeetingRoomsImport, request()->file('file'));
   //      return back();
   //  }
}
