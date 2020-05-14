<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [
        'name','num_of_std','department_id',
    ];

    public function batchSchedule(){
        return $this->hasMany(BatchSchedule::class,'batch_id');
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
