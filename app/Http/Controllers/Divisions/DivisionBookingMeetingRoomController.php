<?php

namespace App\Http\Controllers\Divisions;

use App\Http\Controllers\Controller;
use App\Models\DivisionBookingMeetingRoom;
use App\Models\DivisionMeetingRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DivisionBookingMeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $divisionbooking = DivisionBookingMeetingRoom::get();
        if (
            !$request->has('start')
            || !$request->has('end')
        ) {
            return view('divisions.divisionconditionbookingmeetingroom')->with(['divisionbooking'=>$divisionbooking]);
        }

        $startdate = date('Y-m-d H:i:s', strtotime($request->get('start')));
        $enddate = date('Y-m-d H:i:s', strtotime($request->get('end')));

        $roomDivisions = DivisionMeetingRoom::get();

        $unavailableRooms = DivisionBookingMeetingRoom::query()
          ->overlap($startdate, $enddate)
          ->get();

        $result = [];
        logger($unavailableRooms);
        foreach ($roomDivisions as $room) {
            $tmp = [];
            $tmp['room'] = $room;
            if ($unavailableRooms->pluck('meeting_room_id')->contains($room->id)) {
                $tmp['available'] = false;
                logger('room id: ' . $room->id . ' unavailable');
                foreach ($unavailableRooms as $unavailable) {
                    if ($room->id == $unavailable->meeting_room_id) {
                        $tmp['status'] = $room->name . ' ไม่สามารถจองได้เนื่องจากถูกจองแล้วช่วง ' . $unavailable->start->format('d-m-Y H:i:s') . ' ถึง ' . $unavailable->end->format('d-m-Y H:i:s');
                    }
                }
            } else {
                $tmp['available'] = true;
                $tmp['status'] = $room->name;
            }
            $result[] = $tmp;
        }
        $col = collect($result);
        $sort = $col->sortBy('available');
        $resultcomplete = $sort->values()->all();
        $request->flash();
        session()->put('start', $startdate);
        session()->put('end', $enddate);

        return view('divisions.divisionconditionbookingmeetingroom')->with(['result' => $resultcomplete, 'divisionbooking'=>$divisionbooking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (
            !$request->session()->get('start')
            || !$request->session()->get('end')
        ) {
            return Redirect::route('division.condition.booking.meeting.rooms');
        }

        $data = [
         'start' => session()->get('start'),
         'end' => session()->get('end'),
         'room_id' => session()->get('selected_room_id'),
     ];
        $division = DivisionMeetingRoom::find($data['room_id']);
        session()->put('room_id', $data['room_id']);
        $dataDisplay = 'ช่วงเวลาที่ต้องการจอง ' . $data['start'] . ' ถึง ' . $data['end'] . ' ห้องประชุมที่จอง ' . $division->name;

        return view('divisions.divisionbookingmeetingroom', ['data' => $dataDisplay]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
         'title' => 'required|string|max:255',
         'name_coordinate' => 'nullable|string',
         'comment' => 'nullable|string|max:255',
        ]);
        $validated['start'] = session()->get('start');
        $validated['end'] = session()->get('end');
        $validated['meeting_room_id'] = session()->get('room_id');

        $overlap = DivisionBookingMeetingRoom::query()
          ->overlap($validated['start'], $validated['end'])
          ->where('meeting_room_id', $validated['meeting_room_id'])
          ->count();

        if ($overlap) {
            $message = 'ไม่สามารถจองได้ กรุณาเลือกเวลาใหม่';
            $params = [
              'start' => $validated['start'],
              'end' => $validated['end'],
          ];

            return Redirect::route('division.condition.booking.meeting.rooms', $params)->with(['message' => $message]);
        }

        DivisionBookingMeetingRoom::create($validated);

        session()->forget('start');
        session()->forget('end');
        session()->forget('attendees');

        $message = 'จองสำเร็จ';

        return Redirect::route('division.condition.booking.meeting.rooms', ['message'=>$message]);
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

    public function selectRoom(Request $request)
    {
        $validated = $request->validate(['room_id' => 'required|exists:division_meeting_rooms,id']);
        session()->put('selected_room_id', $validated['room_id']);

        return redirect()->route('division.booking.meeting.room.create');
    }
}
