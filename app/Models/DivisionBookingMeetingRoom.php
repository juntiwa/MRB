<?php

namespace App\Models;

use App\Casts\BookingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionBookingMeetingRoom extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'comment',
      'start',
      'end',
      'meeting_room_id',
      'name_coordinate',
      'requester_id',
      'approver_id'
    ];
    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
        'status' => BookingStatus::class,
    ];

    public function scopeOverlap($query, $start, $end)
    {
        $query->where('start', '<=', $end)
            ->where('end', '>=', $start);
    }
}
