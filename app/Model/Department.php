<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
    ];
    public function classSchedule(){
        return $this->hasMany(ClassSchedule::class);
    }
    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function coordinators(){
        return $this->hasMany(Coordinator::class,'department_id');
    }
}
