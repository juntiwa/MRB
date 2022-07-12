<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineMeetingRoom extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'name',
      'short_name',
      'minimum_attendees',
      'maximum_attendees',
      'advance_booking_under_days',
      'location',
      'images',
    ];

    protected $casts = [
       'images' => 'array',
    ];
}
