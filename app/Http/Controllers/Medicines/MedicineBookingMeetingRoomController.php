<?php

namespace App\Http\Controllers\Medicines;

use App\Http\Controllers\Controller;
use App\Models\MedicineBookingMeetingRoom;
use App\Models\MedicineMeetingRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MedicineBookingMeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $medicinebooking = MedicineBookingMeetingRoom::get();
        if (
            !$request->has('start')
            || !$request->has('end')
            || !$request->has('attendees')
        ) {
            return view('medicines.medicineconditionbookingmeetingroom')->with(['medicinebooking'=>$medicinebooking]);
        }

        $startdate = date('Y-m-d H:i:s', strtotime($request->get('start')));
        $enddate = date('Y-m-d H:i:s', strtotime($request->get('end')));
        $attendees = $request->get('attendees');

        $roomsThoseMeetAttendeeRequirement = MedicineMeetingRoom::query()
            ->where('minimum_attendees', '<=', $attendees)
            ->where('maximum_attendees', '>=', $attendees)
            ->get();

        $reply['meet_attendee'] = $roomsThoseMeetAttendeeRequirement->pluck('id');

        $unavailableRooms = MedicineBookingMeetingRoom::query()
            ->overlap($startdate, $enddate)
            ->whereIn('meeting_room_id', $roomsThoseMeetAttendeeRequirement->pluck('id'))
            ->get();
       
        $result = [];
        logger($unavailableRooms);
        foreach ($roomsThoseMeetAttendeeRequirement as $room) {
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
        session()->put('attendees', $request->attendees);

        return view('medicines.medicineconditionbookingmeetingroom')->with(['result' => $resultcomplete,'medicinebooking'=>$medicinebooking]);
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
            || !$request->session()->get('attendees')
         ) {
               return Redirect::route('medicine.condition.booking.meeting.rooms');
         }
        
        $data = [
            'start' => session()->get('start'),
            'end' => session()->get('end'),
            'attendees' => session()->get('attendees'),
            'room_id' => session()->get('selected_room_id'),
        ];
        $medicine = MedicineMeetingRoom::find($data['room_id']);
        session()->put('room_id', $data['room_id']);
        $dataDisplay = 'ช่วงเวลาที่ต้องการจอง ' . $data['start'] . ' ถึง ' . $data['end'] . ' จำนวนผู้เข้าร่วม ' . $data['attendees'] .
            ' ห้องประชุมที่จอง ' . $medicine->name;
        return view('medicines.medicinebookingmeetingroom', ['data' => $dataDisplay]);
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
           'equipment.computer' => 'regex:/on/i',
           'equipment.lcdprojecter' => 'regex:/on/i',
           'equipment.visualizer' => 'regex:/on/i',
           'equipment.sound' => 'regex:/on/i',
           'name_coordinate' => 'nullable|string',
           'comment' => 'nullable|string|max:255',
           'equipment.other' => 'nullable|string|max:255',
          ]);
        $validated['start'] = session()->get('start');
        $validated['end'] = session()->get('end');
        $validated['attendees'] = session()->get('attendees');
        $validated['meeting_room_id'] = session()->get('room_id');

        $overlap = MedicineBookingMeetingRoom::query()
            ->overlap($validated['start'], $validated['end'])
            ->where('meeting_room_id', $validated['meeting_room_id'])
            ->count();

        if ($overlap) {
            $message = 'ไม่สามารถจองได้ กรุณาเลือกเวลาใหม่';
            $params = [
                'start' => $validated['start'],
                'end' => $validated['end'],
                'attendees' => $validated['attendees'],
            ];
            return Redirect::route('medicine.condition.booking.meeting.rooms', $params)->with(['message' => $message]);
        }

        $equipmentCheckList = collect([
            'computer',
            'lcdprojecter',
            'visualizer',
            'sound',
         ]);

        $equipment = $validated['equipment'];
        foreach ($equipment as $key => $value) {
            if ($equipmentCheckList->contains($key)) {
                $equipment[$key] = true;
            }
        }
        $validated['equipment'] = $equipment;

        MedicineBookingMeetingRoom::create($validated);

        session()->forget('start');
        session()->forget('end');
        session()->forget('attendees');

        return Redirect::route('medicine.condition.booking.meeting.rooms');
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
        $validated = $request->validate(['room_id' => 'required|exists:medicine_meeting_rooms,id']);
        session()->put('selected_room_id', $validated['room_id']);
        return redirect()->route('medicine.booking.meeting.room.create');
    }
}
