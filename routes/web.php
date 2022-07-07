<?php

use App\Http\Controllers\Medicines\MedicineMeetingRoomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(MedicineMeetingRoomController::class)->group(function () {
    Route::get('medicine-meeting-rooms', 'index')->name('medicine.meeting.rooms');
});

Route::controller(\App\Http\Controllers\Medicines\MedicineBookingMeetingRoomController::class)->group(function (){
    Route::get('medicine-condition-booking-meeting-rooms','index')->name('medicine.condition.booking.meeting.rooms');
    Route::post('medicine-selectroom-booking-meeting-rooms','selectRoom')->name('medicine.booking.meeting.room.selectRoom');
    Route::get('medicine-booking-meeting-rooms','create')->name('medicine.booking.meeting.room.create');
    Route::post('medicine-booking-meeting-room-store','store')->name('medicine.booking.meeting.room.store');
});


//import
Route::get('medicine-room-import',\App\Http\Controllers\Import\MedicineMeetingRoomImportController::class)->name('medicine.room.import');
