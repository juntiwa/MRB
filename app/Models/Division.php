<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    public function division()
    {
        // return $this->belongsTo(Department::class, 'foreign_key', 'owner_key');
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function user()
    {
        // return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
        return $this->hasMany(User::class, 'division_id', 'id');
    }
}
