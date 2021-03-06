<?php

namespace App\Http\Controllers\Divisions;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\DivisionMeetingRoom;
use Illuminate\Http\Request;

class DivisionMeetingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::get();
        $divisionsRoom = DivisionMeetingRoom::get();

        return view('divisions.divisionmeetingroom', ['divisions'=>$divisions, 'divisionsRoom'=>$divisionsRoom]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
         'name' => 'required',
         'short_name' => 'required',
         'location' => 'required',
         'images' => 'required',
         'division_id' => 'required' //Auth->user()->division_id
      ]);
      DivisionMeetingRoom::create($validated);
      return redirect()->route('division.meeting.rooms');
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
