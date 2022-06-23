<?php

namespace App\Http\Controllers\Medicines;

use App\Http\Controllers\Controller;
use App\Models\MedicineBookingMeetingRoom;
use App\Models\MedicineMeetingRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedicineMeetingRoomBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = MedicineBookingMeetingRoom::all();

        //   return view('booking', compact('bookings'));
        return view('booking', ['bookings' => $bookings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = MedicineMeetingRoom::get();

        return view('medicinebooking', ['medicines' => $medicines]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      //   return $request->all();
        // validate
        // change checkbox "on" => true
         $validated = $request->validate([
           'title' => 'required|string|max:255',
           'start' => 'required',
           'end' => 'required',
           'meeting_room_id' => 'required|exists:medicine_meeting_rooms,id',
           'equipment.computer' => 'regex:/on/i',
           'equipment.lcdprojecter' => 'regex:/on/i',
           'equipment.visualizer' => 'regex:/on/i',
           'equipment.sound' => 'regex:/on/i',
           'equipment.other' => 'nullable|string|max:255',
          ]);

      //   $bookings = new MedicineBookingMeetingRoom;
      //   $bookings->title = $request->title;
      //   $bookings->comment = $request->comment;
      //   $bookings->start = $request->start;
      //   $bookings->end = $request->end;
      //   $bookings->meeting_room_id = $request->meeting_room_id;
      //   $bookings->name_coordinate = $request->name_coordinate;
      //   $bookings->equipment = $request->equipment;
      //   $bookings->save();

        MedicineBookingMeetingRoom::create($validated);

        return Redirect::route('medicine.rooms.booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
