<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;

use App\Model\ClassSchedule;
use App\Model\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){
        $teacherId = auth()->user()->id;
        $weekday = date('l', strtotime(date('Y-m-d')));

        $data['schedules']= ClassSchedule::where('teacher_id','=',$teacherId)
            ->where('day','=',$weekday)
            ->where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->select('*')
            ->get();

        return view('teachers.dashboard',$data);
    }
}
