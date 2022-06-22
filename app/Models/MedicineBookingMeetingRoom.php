<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineBookingMeetingRoom extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'comment',
      'start',
      'end',
      'meeting_room_id',
      'name_coordinate',
      'equipment',
  ];
    protected $casts = [
      'equipment' => AsArrayObject::class,
  ];
}
