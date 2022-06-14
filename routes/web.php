<?php

use App\Http\Controllers\Imports\MedicineMeetingRoomImportController;
use App\Http\Controllers\MedicineMeetingRoomController;
use App\Http\Controllers\UserController;
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

    Route::get('medicine-meeting-rooms', 'index');
   //  Route::post('medicine-meeting-rooms', 'store')->name('medicine.store');

});
Route::post('medicine-meeting-room-import', MedicineMeetingRoomImportController::class)->name('medicine.store.import');


