<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;

use App\Model\ClassSchedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $teacherId = auth()->user()->id;
        $weekday = date('l', strtotime(date('Y-m-d')));
        $data['schedules']= ClassSchedule::where('teacher_id','=',$teacherId)
            ->where('day','=',$weekday)
            ->get();
        return view('teachers.dashboard',$data);
    }
}
