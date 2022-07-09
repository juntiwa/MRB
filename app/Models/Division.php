<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    //  public function division()
    //  {
    //  depertment has many divisions <==> division belongs to department
    //      // return $this->belongsTo(Department::class, 'foreign_key', 'owner_key');
    //      return $this->belongsTo(Department::class, 'department_id', 'id');
    //  }

    public function users()
    {
        //division has many users
        // return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
        return $this->hasMany(User::class);
    }
}
