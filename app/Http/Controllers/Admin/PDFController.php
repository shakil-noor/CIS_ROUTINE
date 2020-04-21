<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ClassSchedule;
use App\Model\Teacher;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function teacherSchedulePDF($id){
        $data['teacher'] = Teacher::findOrFail($id);
        $teacherName = $data['teacher']->name;
        
    	$data['saturday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','saturday'],['teacher_id','=', $id]])->get();
        $data['sunday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','sunday'],['teacher_id', '=', $id]])->get();
        $data['monday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','monday'],['teacher_id', '=',$id]])->get();
        $data['tuesday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','monday'],['teacher_id', '=', $id]])->get();
        $data['wednesday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','wednesday'],['teacher_id', '=',$id]])->get();
        $data['thursday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','thursday'],['teacher_id', '=', $id]])->get();

        $pdf = PDF::loadView('admin.schedule.teacherSchedulePDF', $data);
//        dd($pdf);
        return $pdf->download($teacherName.'Schedule.pdf');

        //return view('admin.schedule.teacherSchedule',$data);
    }
}
