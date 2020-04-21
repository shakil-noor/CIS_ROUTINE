<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Batch;
use App\Model\ClassSchedule;
use App\Model\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['batches'] = Batch::orderBy('id','ASC')->get();
        $data['teachers'] = Teacher::orderBy('id','desc')->get();
        return view('admin.schedule.list',$data);
    }

    public function teacherSchedule($id){
        $data['teacher'] = Teacher::findOrFail($id);
        $data['saturday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','saturday'],['teacher_id','=', $id]])->get();
        $data['sunday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','sunday'],['teacher_id', '=', $id]])->get();
        $data['monday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','monday'],['teacher_id', '=',$id]])->get();
        $data['tuesday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','monday'],['teacher_id', '=', $id]])->get();
        $data['wednesday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','wednesday'],['teacher_id', '=',$id]])->get();
        $data['thursday'] = ClassSchedule::orderBy('start_time','ASC')->where([['day','=','thursday'],['teacher_id', '=', $id]])->get();

        return view('admin.schedule.teacherSchedule',$data);
    }
    public function batchSchedule(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedule.add');
    }

    public function scheduleRequest(Request $request){

        $day = $request->day;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $data=[];

        $course =DB::select(DB::raw("SELECT courses.id, courses.title FROM courses 
            WHERE courses.id not in( 
                SELECT course_id FROM `class_schedules` 
                WHERE class_schedules.day='$day'
                AND (class_schedules.start_time 
                BETWEEN '$start_time' and '$end_time' 
                OR class_schedules.end_time 
                BETWEEN '$start_time' and '$end_time'))")
        );

        $room =DB::select(DB::raw("SELECT rooms.id, rooms.room_no FROM rooms 
            WHERE rooms.id not in( 
                SELECT room_id FROM `class_schedules` 
                WHERE class_schedules.day='$day'
                AND (class_schedules.start_time 
                BETWEEN '$start_time' and '$end_time'
                OR class_schedules.end_time 
                BETWEEN '$start_time' and '$end_time'))")
        );

        $teacher =DB::select(DB::raw("SELECT teachers.id, teachers.name FROM teachers 
            WHERE teachers.id not in( 
                SELECT teacher_id FROM `class_schedules` 
                WHERE class_schedules.day='$day'
                AND (class_schedules.start_time 
                BETWEEN '$start_time' and '$end_time'
                OR class_schedules.end_time 
                BETWEEN '$start_time' and '$end_time'))")
        );

        $batch = DB::select(DB::raw("SELECT batches.id, batches.name FROM batches
                                        WHERE batches.id not in( 
                                            SELECT batch_id FROM `batch_schedules` 
                                                WHERE batch_schedules.schedule_id NOT IN (
                                                    SELECT class_schedules.id FROM class_schedules
                                                    WHERE class_schedules.day='$day'
                                                    AND(
                                                        class_schedules.start_time 
                                                        BETWEEN '$start_time' and '$end_time'
                                                        OR class_schedules.end_time 
                                                        BETWEEN '$start_time' and '$end_time'
                                                     )
                                                )
                                         )
                                    ")
                            );
        $data['courses'] = $course;
        $data['rooms'] = $room;
        $data['teachers'] = $teacher;
        $data['batches'] = $batch;

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
