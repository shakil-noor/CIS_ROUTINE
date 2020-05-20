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

        date_default_timezone_set("Asia/Dhaka");
        $teacherId = auth()->user()->id;
        $weekday = date('l', strtotime(date('Y-m-d')));

        $data['schedules'] = ClassSchedule::with('department','room','course','batchSchedule.batch')->orderBy('start_time','ASC')
            ->where('day','=',$weekday)
            ->where('teachers.id','=',$teacherId)
            ->where('semesters.status','=','Active')
            ->join('teachers','teachers.id', '=', 'class_schedules.teacher_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        return view('teachers.dashboard',$data);
    }
}
