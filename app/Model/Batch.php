<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'name','num_of_std',
    ];

    public function classSchedule(){
        return $this->hasMany(ClassSchedule::class);
    }
}
