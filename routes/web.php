<?php

use App\Http\Controllers\Divisions\DivisionBookingMeetingRoomController;
use App\Http\Controllers\Divisions\DivisionMeetingRoomController;
use App\Http\Controllers\Divisions\DivisionReasonStatusController;
use App\Http\Controllers\Import\MedicineMeetingRoomImportController;
use App\Http\Controllers\Medicines\MedicineBookingMeetingRoomController;
use App\Http\Controllers\Medicines\MedicineMeetingRoomController;
use App\Http\Controllers\Medicines\MedicineReasonStatusController;
use App\Http\Controllers\ReasonStatusController;
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
    return view('dashboard');
});

Route::controller(MedicineMeetingRoomController::class)->group(function () {
    Route::get('medicine-meeting-rooms', 'index')->name('medicine.meeting.rooms');
});

Route::controller(MedicineBookingMeetingRoomController::class)->group(function () {
    Route::get('medicine-condition-booking-meeting-rooms', 'index')->name('medicine.condition.booking.meeting.rooms');
    Route::post('medicine-selectroom-booking-meeting-rooms', 'selectRoom')->name('medicine.booking.meeting.room.selectRoom');
    Route::get('medicine-booking-meeting-rooms', 'create')->name('medicine.booking.meeting.room.create');
    Route::post('medicine-booking-meeting-room-store', 'store')->name('medicine.booking.meeting.room.store');
    Route::post('medicine-booking-meeting-room-update/{id}','update')->name('medicine.booking.meeting.room.update');
});

Route::controller(DivisionMeetingRoomController::class)->group(function () {
    Route::get('division-meeting-rooms', 'index')->name('division.meeting.rooms');
});

Route::controller(DivisionBookingMeetingRoomController::class)->group(function () {
    Route::get('division-condition-booking-meeting-rooms', 'index')->name('division.condition.booking.meeting.rooms');
    Route::post('division-selectroom-booking-meeting-rooms', 'selectRoom')->name('division.booking.meeting.room.selectRoom');
    Route::get('division-booking-meeting-rooms', 'create')->name('division.booking.meeting.room.create');
    Route::post('division-booking-meeting-room-store', 'store')->name('division.booking.meeting.room.store');
    Route::post('division-booking-meeting-room-update/{id}','update')->name('division.booking.meeting.room.update');
});

Route::controller(MedicineReasonStatusController::class)->group(function(){
   Route::get('medicine-reasons','index')->name('medicine.reasons');
   Route::post('medicine-reason-store','store')->name('medicine.reason.store');
});

Route::controller(DivisionReasonStatusController::class)->group(function(){
   Route::get('division-reasons','index')->name('division.reasons');
   Route::post('division-reason-store','store')->name('division.reason.store');
});

//import
Route::post('medicine-room-import', MedicineMeetingRoomImportController::class)->name('medicine.room.import');
