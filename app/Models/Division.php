<?php

namespace App\Models;

use App\Traits\CSVLoadable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory, CSVLoadable;

    protected $fillable = [
      'name_th',
      'name_short_th',
      'name_en',
      'name_short_en',
      'department_id',
    ];
    
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
