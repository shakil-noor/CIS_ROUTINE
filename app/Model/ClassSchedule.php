<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function Semester(){
        return $this->belongsTo(Semester::class);
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
}
