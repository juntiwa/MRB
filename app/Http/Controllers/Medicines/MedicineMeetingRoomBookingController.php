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
    public function index(Request $request)
    {
        if (
         !$request->has('start')
         || !$request->has('end')
         || !$request->has('attendees')
      ) {
            return view('condition');
        }

        $startdate = date('Y-m-d H:i:s', strtotime($request->get('start')));
        $enddate = date('Y-m-d H:i:s', strtotime($request->get('end')));
        $attendees = $request->get('attendees');

        // step 1
        $roomsThoseMeetAttendeeRequirement = MedicineMeetingRoom::query()
                  ->where('minimum_attendees', '<=', $attendees)
                  ->where('maximum_attendees', '>=', $attendees)
                  ->get();

        $reply['meet_attendee'] = $roomsThoseMeetAttendeeRequirement->pluck('id');

        // step 2
        $unavailableRooms = MedicineBookingMeetingRoom::query()
                              ->where('start', '<=', $enddate)
                              ->where('end', '>=', $startdate)
                              ->whereIn('meeting_room_id', $roomsThoseMeetAttendeeRequirement->pluck('id'))
                              ->get();
        /**
         * 1 นำค่าของ $unavailableRooms แต่ละตัว ทดสอบว่าอยู่ใน ค่า id ของ $roomsThoseMeetAttendeeRequirement หรือไม่.
         */
        $result = [];
        logger($unavailableRooms);
        foreach ($roomsThoseMeetAttendeeRequirement as $room) {
            $tmp = [];
            $tmp['room'] = $room;
            if ($unavailableRooms->pluck('meeting_room_id')->contains($room->id)) {
                $tmp['available'] = false;
                logger('room id: ' . $room->id . ' unavailable');
                //  เพิ่ม loop สำหรับแสดงเวลา
                foreach ($unavailableRooms as $unavailable) {
                    if ($room->id == $unavailable->meeting_room_id) {
                        $tmp['status'] = $room->name . ' ไม่สามารถจองได้เนื่องจากถูกจองแล้วช่วง ' . $unavailable->start->format('d-m-Y H:i:s') . ' ถึง ' . $unavailable->end->format('d-m-Y H:i:s');
                    }
                    //   $tmp['start'] = date('d-m-Y H:i:s', strtotime($unavailable->start));
                  //   $tmp['end'] = date('d-m-Y H:i:s', strtotime($unavailable->end));
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
        //   return $result;
        $request->flash();

        //   return $oldinput;

        return view('condition')->with(['result' => $resultcomplete]);

        return 'todo';
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

        $equipmentCheckList = collect([
            'computer',
            'lcdprojecter',
            'visualizer',
            'sound',
         ]);

        $equipment = $validated['equipment'];
        foreach ($equipment as $key => $value) {
            // if ($key != 'other') {
            //     $equipment[$key] = true;
            // }
            // if ($value == 'on') {
            //     $equipment[$key] = true;
            // }
            if ($equipmentCheckList->contains($key)) {
                $equipment[$key] = true;
            }
        }
        $validated['equipment'] = $equipment;

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
    public function show(Request $request)
    {
        $startdate = date('Y-m-d H:i:s', strtotime($request->get('start')));
        $enddate = date('Y-m-d H:i:s', strtotime($request->get('end')));
        $attendees = $request->get('attendees');

        // (start_input <= end_exists) and (end_input >= start_exists)
        /*
         * SELECT *
         * FROM medicine_booking_meeting_rooms
         * WHERE ($startdate <= end)
         *   AND ($enddate >= start)
         *   AND ห้องที่สอดคล้องกับจำนวนคน
         *
         *   1. สมมติหาได้ว่าห้องที่สอดคล้องกับจำนวนคนคือไอดีต่อไปนี้ [5, 10, 15]
         *   2. หาว่า (start_input <= end_exists) and (end_input >= start_exists) เป็นจริงกับ [5, 10, 15] ไอดีไหนบ้าง
         *   3. ถ้าเป็นจริงทั้งหมดทั้ง 5 10 15 แปลว่า
         */

        // step 1
        $roomsThoseMeetAttendeeRequirement = MedicineMeetingRoom::query()
                  ->where('minimum_attendees', '<=', $attendees)
                  ->where('maximum_attendees', '>=', $attendees)
                  ->get();

        $reply['meet_attendee'] = $roomsThoseMeetAttendeeRequirement->pluck('id');

        // step 2
        $unavailableRooms = MedicineBookingMeetingRoom::query()
                              ->where('start', '<=', $enddate)
                              ->where('end', '>=', $startdate)
                              ->whereIn('meeting_room_id', $roomsThoseMeetAttendeeRequirement->pluck('id'))
                              ->get();
        /**
         * 1 นำค่าของ $unavailableRooms แต่ละตัว ทดสอบว่าอยู่ใน ค่า id ของ $roomsThoseMeetAttendeeRequirement หรือไม่.
         */
        $result = [];
        foreach ($roomsThoseMeetAttendeeRequirement as $room) {
            // $result[]['room'] = $room;
            // if ($unavailableRooms->pluck('meeting_room_id')->contains($room->id)) {
            //     $result[]['available'] = false;
            //     //  เพิ่ม loop สำหรับแสดงเวลา
            //     foreach ($unavailableRooms as $unavailable) {
            //         if ($room->id == $unavailable->meeting_room_id) {
            //             $result[]['status'] = 'no ready ' . $unavailable->start;
            //         }
            //     }
            // } else {
            //     $result[]['available'] = true;
            //     $result[]['status'] = 'ready';
            // }

            $tmp = [];
            $tmp['room'] = $room;
            if ($unavailableRooms->pluck('meeting_room_id')->contains($room->id)) {
                $tmp['available'] = false;
                //  เพิ่ม loop สำหรับแสดงเวลา
                foreach ($unavailableRooms as $unavailable) {
                    $tmp['status'] = 'no ready ' . $unavailable->start;
                }
            } else {
                $tmp['available'] = true;
                $tmp['status'] = 'ready';
            }
            $result[] = $tmp;

            // $roomStatus['id'] = $unavailable->meeting_room_id;
            // if ($roomsThoseMeetAttendeeRequirement->pluck('id')->contains($unavailable->meeting_room_id)) {
            //     $roomStatus['available'] = false;
            // } else {
            //     $roomStatus['available'] = true;
            // }
        }

        // return back()->with('result', $result);

        return $result;

        $reply['unavailable'] = $unavailableRooms;
        //   $rooms = [
        //       ['id' => 1, 'available' => true, 'room' => $room1, 'status' => 'ready'],
        //       ['id' => 16, 'available' => false, 'room' => $room16, 'status' => 'แสดงเวลาที่ห้องถูกใช้ในวันนั้น'],
        //    ];

        return  $reply;

        $timestampstartdate = date('Y-m-d H:i:s', strtotime($startdate));
        $timestampenddate = date('Y-m-d H:i:s', strtotime($enddate));
        $bookings = MedicineBookingMeetingRoom::whereTime('start', '>=', $timestampstartdate)->get();
        $meetingRooms = MedicineMeetingRoom::where('minimum_attendees', '<=', $attendees)->where('maximum_attendees', '>=', $attendees)->get();

        $time = $startdate . ' => ' . $timestampstartdate;

        return $time;
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
