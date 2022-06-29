<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function divisions()
    {
        // return $this->belongsTo(Division::class, 'foreign_key', 'owner_key');
        return $this->hasMany(Division::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Division::class);
    }
}
