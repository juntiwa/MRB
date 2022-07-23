<?php

namespace App\Models;

use App\Traits\CSVLoadable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionMeetingRoom extends Model
{
   use HasFactory, CSVLoadable;

   protected $fillable = [
      'name',
      'short_name',
      'location',
      'images',
      'division_id'
   ];
}
