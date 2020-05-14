@extends('layouts.admins.master')
@section('title','Edit Class Schedule')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Class Schedule</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Class Schedule Edit</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Class Schedule Update form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('classSchedule.update',$classSchedule->id)}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Day</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="day" id="day">
                                    <option @if($classSchedule->day == 'Saturday') selected @endif value="Saturday">Saturday</option>
                                    <option @if($classSchedule->day == 'Sunday') selected @endif value="Sunday">Sunday</option>
                                    <option @if($classSchedule->day == 'Monday') selected @endif value="Monday">Monday</option>
                                    <option @if($classSchedule->day == 'Tuesday') selected @endif value="Tuesday">Tuesday</option>
                                    <option @if($classSchedule->day == 'Wednesday') selected @endif value="Wednesday">Wednesday</option>
                                    <option @if($classSchedule->day == 'Thursday') selected @endif value="Thursday">Thursday</option>
                                </select>
                                @error('course_type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Start Time</label>
                            <div class="col-md-10">
                                <input type="time" value="{{ $classSchedule->start_time }}" name="start_time" id="start_time" class="form-control" placeholder="Start Time" required>
                                @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">End Time</label>
                            <div class="col-md-10">
                                <input type="time" value="{{ $classSchedule->end_time }}" name="end_time" id="end_time" class="form-control" placeholder="End Time" required>
                                @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Department</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department_id" id="department">
                                    @foreach($departments as $department)
                                        <option @if($classSchedule->department_id == $department->id)selected @endif value="{{ $department->id }}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="course_id" id="course">
                                    <option selected value="{{ $classSchedule->course_id }}">{{ $classSchedule->course->title }}</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="room_id" id="room">
                                    <option value="{{ $classSchedule->room_id}}" selected >{{ $classSchedule->room->room_no.'('.$classSchedule->room->capacity.')' }}</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_no.'('.$room->capacity.')' }}</option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Teacher</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="teacher_id" id="teacher">
                                    <option value="{{ $classSchedule->teacher_id }} ">{{  $classSchedule->teacher->name }}   </option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{  $teacher->name }}}   </option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Semester</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="semester_id" id="semester">
                                    <option value="">Select Semester</option>
                                    @foreach($semesters as $semester)
                                        <option @if($classSchedule->semester_id == $semester->id)selected @endif value="{{ $semester->id }}">{{$semester->name}}</option>
                                    @endforeach
                                </select>
                                @error('semester_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Batches</label>
                            <div class="col-sm-10">
                                <select class="form-control" multiple  name="batches[]" id="batches" >
                                    @foreach($classSchedule->batchSchedule as $bt)
                                        <option selected value="{{ $bt->batch_id }}">{{ $bt->batch->name }}</option>
                                    @endforeach
                                    @foreach($batches as $bt)
                                        <option  value="{{ $bt->id }}">{{ $bt->name }}</option>
                                    @endforeach
                                </select>
                                @error('batches')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <input type="submit"  class="btn btn-info full-right" value="Submit">
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- End row -->
@endsection

@section('scheduleAjaxRequest')
    <script>
        $(document).ready(function(){
            $(function (){
                $('#day,#start_time,#end_time').on('change', function() {
                    var day = $('#day').val();
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();

                    //console.log({day:day, start_time:start_time,end_time:end_time});
                    if (!!day && !!start_time  && !!end_time){
                        //console.log('true');

                        $.ajax({
                            type:'GET',
                            url: '{{route('ScheduleRequest')}}',
                            data: {day:day, start_time:start_time,end_time:end_time},
                            dataType: 'json',
                            success:function(responce){
                                $('#course').html('<option selected value="{{ $classSchedule->course_id }}">{{ $classSchedule->course->title }}</option>');
                                var len = responce.courses.length;

                                for (var i = 0; i < len; i++) {
                                    var course_title = responce.courses[i].title;
                                    var course_id = responce.courses[i].id;
                                    var tr_str = "<option value="+course_id+">"+course_title+"</option>";
                                    $("#course").append(tr_str);
                                }

                                $('#room').html('<option selected value="{{  $classSchedule->room_id }}">{{  $classSchedule->room->room_no }}</option>');
                                var len = responce.rooms.length;
                                //alert(len);
                                for (var i = 0; i < len; i++) {
                                    var room_id = responce.rooms[i].id;
                                    var room_no = responce.rooms[i].room_no;
                                    var capacity = responce.rooms[i].capacity;
                                    //var tr_str = "<option value="+room_id+">"+room_no+ "</option>";
                                    var tr_str = "<option value="+room_id+">"+room_no+ "("+ capacity +")"+ "</option>";
                                    $("#room").append(tr_str);
                                }

                                $('#teacher').html('<option selected value="{{  $classSchedule->teacher_id }}">{{  $classSchedule->teacher->name }}</option>');
                                var len = responce.teachers.length;
                                for (var i = 0; i < len; i++) {
                                    var teacher_name = responce.teachers[i].name;
                                    var teacher_id = responce.teachers[i].id;
                                    var tr_str = "<option value="+teacher_id+">"+teacher_name+"</option>";
                                    $("#teacher").append(tr_str);
                                }

                                $('#batches').html();
                                var len = responce.batches.length;
                                document.getElementById("batches").innerHTML = "";
                                @foreach($classSchedule->batchSchedule as $bt)
                                $("#batches").append("<option selected value='{{ $bt->batch_id }}'>{{ $bt->batch->name }}</option>");
                                        @endforeach
                                for (var i = 0; i < len; i++) {
                                    var batch_id = responce.batches[i].id;
                                    var batch_name = responce.batches[i].name;
                                    var tr_str = "<option value="+batch_id+">"+batch_name+"</option>";
                                    $("#batches").append(tr_str);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
