<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use App\Imports\MedicineMeetingRoomsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MedicineMeetingRoomImportController extends Controller
{
   public function __invoke()
   {
       Excel::import(new MedicineMeetingRoomsImport, request()->file('file')->store('temp'));

       return back();
   }
}
