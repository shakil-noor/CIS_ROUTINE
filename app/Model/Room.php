<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_type','room_no','capacity',
    ];
    public function classSchedule(){
        return $this->hasMany(ClassSchedule::class);
    }
}
