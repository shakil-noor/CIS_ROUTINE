<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = [
        'day',
        'start_time',
        'end_time',
        'course_id',
        'room_id',
        'teacher_id',
        'semester_id',
        'department_id',
        'created_by',
        'updated_by',
    ];

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
    public function semester(){
        return $this->belongsTo(Semester::class);
    }
    public function batchSchedule(){
        return $this->hasMany(BatchSchedule::class,'class_schedule_id');
    }
}
