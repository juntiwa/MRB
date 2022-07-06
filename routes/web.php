<?php

use App\Http\Controllers\Division\DivisionMeetingRoomBookingController;
use App\Http\Controllers\Division\DivisionMeetingRoomController;
use App\Http\Controllers\Imports\DivisionMeetingRoomImportController;
use App\Http\Controllers\Imports\MedicineMeetingRoomImportController;
use App\Http\Controllers\Medicines\MedicineMeetingRoomBookingController;
use App\Http\Controllers\Medicines\MedicineMeetingRoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Medicines
Route::controller(MedicineMeetingRoomController::class)->group(function () {
    Route::get('medicine-meeting-rooms', 'index')->name('medicine.rooms');
    //  Route::post('medicine-meeting-rooms', 'store')->name('medicine.store');
});
Route::post('medicine-meeting-room-import', MedicineMeetingRoomImportController::class)->name('medicine.store.import');
Route::controller(MedicineMeetingRoomBookingController::class)->group(function () {
    Route::get('medicine-meeting-rooms-booking', 'index')->name('medicine.rooms.booking');
    Route::get('medicine-meeting-room-booking-create', 'create')->name('medicine.create');
    Route::post('medicine-meeting-room-booking', 'store')->name('medicine.store');
    Route::get('medicine-meeting-room-booking-show', 'show')->name('medicine.show');
});

// Divisions
Route::controller(DivisionMeetingRoomController::class)->group(function () {
    Route::get('division-meeting-rooms', 'index')->name('division.rooms');
});
Route::post('division-meeting-room-import', DivisionMeetingRoomImportController::class)->name('division.store.import');
Route::controller(DivisionMeetingRoomBookingController::class)->group(function () {
    Route::get('division-meeting-rooms-booking', 'index')->name('division.rooms.booking');
    Route::get('division-meeting-room-booking', 'store')->name('division.store');
});

Route::get('share-data-a', function () {
    $data = 'foo hey';
    session()->put('data-a', $data);

    return [
      'data-a' => session()->get('data-a'),
      'data-b' => session()->get('data-b'),
    ];
});

Route::get('share-data-b', function () {
    $data = 'bar';
    session()->put('data-b', $data);

    return [
      'data-a' => session()->get('data-a'),
      'data-b' => session()->get('data-b'),
    ];
});
