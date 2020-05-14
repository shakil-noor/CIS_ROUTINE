<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ClassSchedule;

class ScheduleController extends Controller
{
    public function index(){
        return view('teachers.schedules.index'); //view all semesters routine
    }

    public function view(){
    	$id = auth()->user()->id;
        $data['saturday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','saturday'],['teacher_id','=', $id]])
            ->Where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        $data['sunday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','sunday'],['teacher_id', '=', $id]])
            ->Where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        $data['monday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','monday'],['teacher_id', '=',$id]])
            ->Where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        $data['tuesday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','monday'],['teacher_id', '=', $id]])
            ->Where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        $data['wednesday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','wednesday'],['teacher_id', '=',$id]])
            ->Where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        $data['thursday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','thursday'],['teacher_id', '=', $id]])
            ->Where('semesters.status','=','Active')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        
        return view('teachers.schedules.view',$data); // view specific semester's routine
    }
}
