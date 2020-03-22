<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name',
    ];
    public function classSchedule(){
        return $this->hasMany(ClassSchedule::class);
    }
}
