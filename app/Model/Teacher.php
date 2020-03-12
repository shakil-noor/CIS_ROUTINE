<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name','designation','email','username','password',
    ];
    public function class_schedule(){
        //return $this->hasMany()
    }
}
