<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BatchSchedule extends Model
{
    protected $fillable = [
        'batch_id','class_schedule_id',
    ];

    public function classSchedule(){
        return $this->hasMany(ClassSchedule::class);
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
}
