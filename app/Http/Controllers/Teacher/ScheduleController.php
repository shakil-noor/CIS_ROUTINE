<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Model\Semester;
use Illuminate\Http\Request;
use App\Model\ClassSchedule;

class ScheduleController extends Controller
{
    public function index(){
        return view('teachers.schedules.index'); //view all semesters routine
    }

    public function view(){
    	$id = auth()->user()->id;
        $semester = Semester::where('status','=','Active')->first();

        $data['saturday'] = ClassSchedule::with(['course','room','batchSchedule'=>function($query){
            return $query->with(['batch'])->get();
        }])->with(['semester'=>function($query){
            return $query->where('status','=','Active')->first();
        }])->orderBy('start_time','ASC')
            ->where([['day','=','saturday'],['teacher_id','=', $id]])
            ->where('semester_id','=',$semester->id)
            ->get();

        $data['sunday'] = ClassSchedule::with(['course','room','batchSchedule'=>function($query){
            return $query->with(['batch'])->get();
        }])->with(['semester'=>function($query){
            return $query->where('status','=','Active')->first();
        }])->orderBy('start_time','ASC')
            ->where([['day','=','sunday'],['teacher_id','=', $id]])
            ->where('semester_id','=',$semester->id)
            ->get();


        $data['monday'] = ClassSchedule::with(['course','room','batchSchedule'=>function($query){
            return $query->with(['batch'])->get();
        }])->with(['semester'=>function($query){
            return $query->where('status','=','Active')->first();
        }])->orderBy('start_time','ASC')
            ->where([['day','=','monday'],['teacher_id','=', $id]])
            ->where('semester_id','=',$semester->id)
            ->get();

        $data['tuesday'] = ClassSchedule::with(['course','room','batchSchedule'=>function($query){
            return $query->with(['batch'])->get();
        }])->with(['semester'=>function($query){
            return $query->where('status','=','Active')->first();
        }])->orderBy('start_time','ASC')
            ->where([['day','=','tuesday'],['teacher_id','=', $id]])
            ->where('semester_id','=',$semester->id)
            ->get();

        $data['wednesday'] = ClassSchedule::with(['course','room','batchSchedule'=>function($query){
            return $query->with(['batch'])->get();
        }])->with(['semester'=>function($query){
            return $query->where('status','=','Active')->first();
        }])->orderBy('start_time','ASC')
            ->where([['day','=','wednesday'],['teacher_id','=', $id]])
            ->where('semester_id','=',$semester->id)
            ->get();

        $data['thursday'] = ClassSchedule::with(['course','room','batchSchedule'=>function($query){
            return $query->with(['batch'])->get();
        }])->with(['semester'=>function($query){
            return $query->where('status','=','Active')->first();
        }])->orderBy('start_time','ASC')
            ->where([['day','=','thursday'],['teacher_id','=', $id]])
            ->where('semester_id','=',$semester->id)
            ->get();

        
        return view('teachers.schedules.view',$data); // view specific semester's routine
    }
}
