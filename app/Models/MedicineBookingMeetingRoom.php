<?php

namespace App\Models;

use App\Casts\BookingStatus;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'attendees',
        'meeting_room_id',
        'name_coordinate',
        'equipment',
        'requester_id'
    ];
    protected $casts = [
        'equipment' => AsArrayObject::class,
        'start' => 'datetime',
        'end' => 'datetime',
        'status' => BookingStatus::class,
    ];

    public function requester() // request_id => id
    {
      return $this->belongsTo(User::class);
   }
   public function approver() // approver_id => id
    {
      return $this->belongsTo(User::class);
    }

   //  protected function status(): Attribute
   //  {
   //    return Attribute::make(
   //       get: fn ($value) => config('app.bookingStatuses')[$value] ?? '#na',
   //       set: fn ($value) => array_search($value, config('app.bookingStatuses')),
   //    );
   //  }

    public function scopeOverlap($query, $start, $end)
    {
        $query->where('start', '<=', $end)
            ->where('end', '>=', $start);
    }
}
