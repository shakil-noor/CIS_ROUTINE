<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name','status',
    ];
    public function classSchedule(){
        return $this->hasMany(ClassSchedule::class);
    }
}
