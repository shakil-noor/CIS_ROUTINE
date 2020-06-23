<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Batch;
use App\Model\BatchSchedule;
use App\Model\ClassSchedule;
use App\Model\Department;
use App\Model\Semester;
use App\Model\Teacher;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['classSchedules'] = ClassSchedule::with('room','course','teacher','batchSchedule.batch')->orderBy('day','ASC')->paginate(9);
        return view('admin.schedule.index',$data);
    }
    public function scheduleView(){
        $data['batches'] = Batch::orderBy('id','DESC')->paginate(5);
        $data['teachers'] = Teacher::orderBy('id','desc')->paginate(5);
        return view('admin.schedule.list',$data);
    }

    public function teacherSchedule($id){
        $data['teacher'] = Teacher::findOrFail($id);
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

        return view('admin.schedule.teacherSchedule',$data);
    }

    public function batchSchedule($id){
        $data['batch'] = Batch::findOrFail($id);
        $semester = Semester::where('status','=','Active')->first();

        $btch = BatchSchedule::where('batch_id','=',$id)->get();
        $saturday = array();
        foreach ($btch as $bt) {
            $cls = ClassSchedule::with(['batchSchedule'=>function($query){
                return $query->with(['batch'])->get();
            }])->where('id','=',$bt->class_schedule_id)
                ->where('semester_id','=',$semester->id)
                ->where('day','=','saturday')
                ->first();
            array_push($saturday,$cls);
        }
        $data['saturday'] = $saturday;

        $sunday = array();
        foreach ($btch as $bt) {
            $cls = ClassSchedule::with(['batchSchedule'=>function($query){
                return $query->with(['batch'])->first();
            }])->where('id','=',$bt->class_schedule_id)
                ->where('semester_id','=',$semester->id)
                ->where('day','=','sunday')
                ->first();
            array_push($sunday,$cls);
        }
        $data['sunday'] = $sunday;

        $monday = array();
        foreach ($btch as $bt) {
            $cls = ClassSchedule::with(['batchSchedule'=>function($query){
                return $query->with(['batch'])->first();
            }])->where('id','=',$bt->class_schedule_id)
                ->where('semester_id','=',$semester->id)
                ->where('day','=','monday')
                ->first();
            array_push($monday,$cls);
        }
        $data['monday'] = $monday;

        $tuesday = array();
        foreach ($btch as $bt) {
            $cls = ClassSchedule::with(['batchSchedule'=>function($query){
                return $query->with(['batch'])->first();
            }])->where('id','=',$bt->class_schedule_id)
                ->where('semester_id','=',$semester->id)
                ->where('day','=','tuesday')
                ->first();
            array_push($tuesday,$cls);
        }
        $data['tuesday'] = $tuesday;

        $wednesday = array();
        foreach ($btch as $bt) {
            $cls = ClassSchedule::with(['batchSchedule'=>function($query){
                return $query->with(['batch'])->first();
            }])->where('id','=',$bt->class_schedule_id)
                ->where('semester_id','=',$semester->id)
                ->where('day','=','wednesday')
                ->first();
            array_push($wednesday,$cls);
        }
        $data['wednesday'] = $wednesday;

        $thursday = array();
        foreach ($btch as $bt) {
            $cls = ClassSchedule::with(['batchSchedule'=>function($query){
                return $query->with(['batch'])->first();
            }])->where('id','=',$bt->class_schedule_id)
                ->where('semester_id','=',$semester->id)
                ->where('day','=','thursday')
                ->first();
            array_push($thursday,$cls);
        }
        $data['thursday'] = $thursday;
        return view('admin.schedule.batchSchedule',$data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departments'] = Department::orderBy('id','ASC')->get();
        $data['semesters'] = Semester::orderBy('id','ASC')->get();
        return view('admin.schedule.add',$data);
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

        $room =DB::select(DB::raw("SELECT rooms.id, rooms.room_no, rooms.capacity FROM rooms 
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

        $batch = DB::select(DB::raw("SELECT batches.id, batches.name, batches.num_of_std FROM batches
                                        WHERE batches.id not in( 
                                            SELECT batch_id FROM `batch_schedules` 
                                                WHERE batch_schedules.class_schedule_id IN (
                                                    SELECT class_schedules.id FROM class_schedules
                                                    WHERE class_schedules.day='$day'
                                                    AND(
                                                        class_schedules.start_time 
                                                        BETWEEN '$start_time' and '$end_time'
                                                        OR class_schedules.end_time 
                                                        BETWEEN '$start_time' and '$end_time'
                                                     )
                                                )
                                         )")
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
        //dd($request->batches);
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'department_id' => 'required|integer',
            'course_id' => 'required|integer',
            'room_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'batches' => 'required|array',
        ]);

        $creator = auth()->user()->username;
        $request->request->add([
            'created_by' => $creator,
        ]);

        DB::beginTransaction();
        try {
            $data = $request->except('batches');
            $schedule = ClassSchedule::create($data);
            foreach ($request->batches as $batch) {
                BatchSchedule::create([
                    'batch_id' => $batch,
                    'class_schedule_id' => $schedule->id,
                ]);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
        }

        session()->flash('message','Class Routine created successfully');
        return redirect()->route('classSchedule.index');
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
        $data['departments'] = Department::orderBy('id','ASC')->get();
        $data['semesters'] = Semester::orderBy('id','ASC')->get();
        $data['classSchedule'] = ClassSchedule::findOrFail($id);

        $day = $data['classSchedule']->day;
        $start_time = $data['classSchedule']->start_time;
        $end_time = $data['classSchedule']->end_time;

        $data['courses'] =DB::select(DB::raw("SELECT courses.id, courses.title FROM courses
            WHERE courses.id not in(
                SELECT course_id FROM `class_schedules`
                WHERE class_schedules.day='$day'
                AND (class_schedules.start_time
                BETWEEN '$start_time' and '$end_time'
                OR class_schedules.end_time
                BETWEEN '$start_time' and '$end_time'))")
        );

        $data['rooms'] =DB::select(DB::raw("SELECT rooms.id, rooms.room_no, rooms.capacity FROM rooms
            WHERE rooms.id not in(
                SELECT room_id FROM `class_schedules`
                WHERE class_schedules.day='$day'
                AND (class_schedules.start_time
                BETWEEN '$start_time' and '$end_time'
                OR class_schedules.end_time
                BETWEEN '$start_time' and '$end_time'))")
        );

        $data['teachers'] =DB::select(DB::raw("SELECT teachers.id, teachers.name FROM teachers
            WHERE teachers.id not in(
                SELECT teacher_id FROM `class_schedules`
                WHERE class_schedules.day='$day'
                AND (class_schedules.start_time
                BETWEEN '$start_time' and '$end_time'
                OR class_schedules.end_time
                BETWEEN '$start_time' and '$end_time'))")
        );

        $data['batches'] = DB::select(DB::raw("SELECT batches.id, batches.name, batches.num_of_std FROM batches
                                        WHERE batches.id not in(
                                            SELECT batch_id FROM `batch_schedules`
                                                WHERE batch_schedules.class_schedule_id IN (
                                                    SELECT class_schedules.id FROM class_schedules
                                                    WHERE class_schedules.day='$day'
                                                    AND(
                                                        class_schedules.start_time
                                                        BETWEEN '$start_time' and '$end_time'
                                                        OR class_schedules.end_time
                                                        BETWEEN '$start_time' and '$end_time'
                                                     )
                                                )
                                         )")
        );

        return view('admin.schedule.edit',$data);
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
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'department_id' => 'required|integer',
            'course_id' => 'required|integer',
            'room_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'semester_id' => 'required|integer',
            'batches' => 'required|array',
        ]);
        $creator = auth()->user()->username;

        DB::beginTransaction();
        try {
            //$data = $request->except('batches');
            $classSchedule = ClassSchedule::findorFail($id);
            $classSchedule->day = $request->day;
            $classSchedule->start_time = $request->start_time;
            $classSchedule->end_time = $request->end_time;
            $classSchedule->department_id = $request->department_id;
            $classSchedule->course_id = $request->course_id;
            $classSchedule->room_id = $request->room_id;
            $classSchedule->teacher_id = $request->teacher_id;
            $classSchedule->semester_id = $request->semester_id;
            $classSchedule->updated_by = $creator;

            $classSchedule->save();
            foreach ($classSchedule->batchSchedule as $batchSchedule) {
                $batchSchedule->delete();
            }
            foreach ($request->batches as $batch) {
                BatchSchedule::create([
                    'batch_id' => $batch,
                    'class_schedule_id' => $classSchedule->id,
                ]);
            }
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error($exception->getMessage());
            session()->flash('message','Something went wrong please try again some thing later');
            return redirect()->back();
        }

        session()->flash('message','Class Routine Updated successfully');
        return redirect()->route('classSchedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = ClassSchedule::findOrFail($id);
        foreach ($class->batchSchedule as $batchSchedule) {
            $batchSchedule->delete();
        }
        $class->delete();
        session()->flash('message','Class Routine Deleted successfully');
        return redirect()->route('classSchedule.index');
    }
}
