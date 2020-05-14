<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Model\Batch;
use App\Model\BatchSchedule;
use App\Model\ClassSchedule;
use App\Model\Semester;
use App\Model\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptId = auth()->user()->department_id ;
        $data['classSchedules'] = ClassSchedule::orderBy('id','DESC')
            ->where('department_id','=',$deptId)
            ->paginate(5);
        return view('coordinators.schedules.index',$data);

    }
    public function scheduleView(){
        $data['batches'] = Batch::orderBy('id','DESC')->paginate(5);
        $data['teachers'] = Teacher::orderBy('id','desc')->paginate(5);
        return view('coordinators.schedules.listView',$data);
    }

    public function teacherSchedule($id){
        $data['teacher'] = Teacher::findOrFail($id);
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

        return view('coordinators.schedules.teacherSchedule',$data);
    }
    public function batchSchedule($id){
        $data['batch'] = Batch::findOrFail($id);
        $data['saturday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where([['day','=','saturday']])
            ->where('batches.id','=',$id)
            ->where('semesters.status','=','Active')
            ->join('batch_schedules','class_schedules.id', '=', 'batch_schedules.class_schedule_id')
            ->join('batches','batches.id', '=', 'batch_schedules.batch_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();
        $data['sunday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where('day','=','sunday')
            ->where('batches.id','=',$id)
            ->where('semesters.status','=','Active')
            ->join('batch_schedules','class_schedules.id', '=', 'batch_schedules.class_schedule_id')
            ->join('batches','batches.id', '=', 'batch_schedules.batch_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();
        $data['monday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where('day','=','monday')
            ->where('batches.id','=',$id)
            ->where('semesters.status','=','Active')
            ->join('batch_schedules','class_schedules.id', '=', 'batch_schedules.class_schedule_id')
            ->join('batches','batches.id', '=', 'batch_schedules.batch_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();
        $data['tuesday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where('day','=','tuesday')
            ->where('batches.id','=',$id)
            ->where('semesters.status','=','Active')
            ->join('batch_schedules','class_schedules.id', '=', 'batch_schedules.class_schedule_id')
            ->join('batches','batches.id', '=', 'batch_schedules.batch_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();
        $data['wednesday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where('day','=','wednesday')
            ->where('batches.id','=',$id)
            ->where('semesters.status','=','Active')
            ->join('batch_schedules','class_schedules.id', '=', 'batch_schedules.class_schedule_id')
            ->join('batches','batches.id', '=', 'batch_schedules.batch_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();
        $data['thursday'] = ClassSchedule::orderBy('start_time','ASC')
            ->where('day','=','thursday')
            ->where('batches.id','=',$id)
            ->where('semesters.status','=','Active')
            ->join('batch_schedules','class_schedules.id', '=', 'batch_schedules.class_schedule_id')
            ->join('batches','batches.id', '=', 'batch_schedules.batch_id')
            ->join('semesters','class_schedules.semester_id', '=', 'semesters.id')
            ->get();

        return view('coordinators.schedules.batchSchedule',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinators.schedules.add');
    }

    public function scheduleRequest(Request $request){

        $day = $request->day;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $data=[];
        $deptId = auth()->user()->department_id ;

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

        $batch = DB::select(DB::raw("SELECT batches.id, batches.name FROM batches
                                        WHERE batches.department_id='$deptId' AND batches.id not in( 
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
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'course_id' => 'required|integer',
            'room_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'batches' => 'required|array',
        ]);
        $semesters = Semester::where("status",'=',"Active")->first();
        $semester_id = $semesters->id;
        $deptId = auth()->user()->department_id ;

        $request->request->add([
            'department_id' => $deptId,
            'semester_id' => $semester_id,
        ]);

        //dd($request->all());

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
        return redirect()->route('schedule.index');
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
        $data['classSchedule'] = ClassSchedule::findOrFail($id);

        $day = $data['classSchedule']->day;
        $start_time = $data['classSchedule']->start_time;
        $end_time = $data['classSchedule']->end_time;
        $deptId = auth()->user()->department_id ;

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

        $data['batches'] = DB::select(DB::raw("SELECT batches.id, batches.name FROM batches
                                        WHERE batches.department_id='$deptId' AND batches.id not in( 
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

        return view('coordinators.schedules.edit',$data);
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
        //dd($request->all());
        $request->validate([
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'course_id' => 'required|integer',
            'room_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'batches' => 'required|array',
        ]);

        $semesters = Semester::where("status",'=',"Active")->first();
        $semester_id = $semesters->id;
        $deptId = auth()->user()->department_id ;

        DB::beginTransaction();
        try {
            //$data = $request->except('batches');
            $classSchedule = ClassSchedule::findorFail($id);
            $classSchedule->day = $request->day;
            $classSchedule->start_time = $request->start_time;
            $classSchedule->end_time = $request->end_time;
            $classSchedule->department_id = $deptId;
            $classSchedule->course_id = $request->course_id;
            $classSchedule->room_id = $request->room_id;
            $classSchedule->teacher_id = $request->teacher_id;
            $classSchedule->semester_id = $semester_id;

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
        return redirect()->route('schedule.index');
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
        return redirect()->route('schedule.index');
    }
}
