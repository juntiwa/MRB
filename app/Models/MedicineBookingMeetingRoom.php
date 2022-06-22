<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineBookingMeetingRoom extends Model
{
    use HasFactory;
    protected $casts = [
      'equipment' => 'array',
  ];
}
