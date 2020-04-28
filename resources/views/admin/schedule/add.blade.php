@extends('layouts.admins.master')
@section('title','New Schedule create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Class Schedule</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Class Schedule create</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Class Schedule create form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('classSchedule.store')}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Day</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="day" id="day">
                                    <option>Select Day</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                </select>
                                @error('course_type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Start Time</label>
                            <div class="col-md-10">
                                <input type="time" value="{{ old('start_time') }}" name="start_time" id="start_time" class="form-control" placeholder="Start Time" required>
                                @error('start_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">End Time</label>
                            <div class="col-md-10">
                                <input type="time" value="{{ old('end_time') }}" name="end_time" id="end_time" class="form-control" placeholder="End Time" required>
                                @error('end_time')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Department</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department_id" id="department">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option @if(old('department_id') == $department->id)selected @endif value="{{ $department->id }}">{{$department->name}}</option>
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
                                <select class="form-control" name="course" id="course">
                                    <option value="">Select Course</option>
                                </select>
                                @error('course')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="room" id="room">
                                    <option value="">Select Room</option>
                                </select>
                                @error('room')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Teacher</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="teacher" id="teacher">
                                    <option value="">Select Teacher</option>
                                </select>
                                @error('teacher')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Batches</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="batches" id="batches" multiple="multiple">
                                    <option value="">Select Batches</option>
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
                            url: '{{route('admin.scheduleRequest')}}',
                            data: {day:day, start_time:start_time,end_time:end_time},
                            dataType: 'json',
                            success:function(responce){
                                $('#course').html('<option value="">Select Course</option>');
                                var len = responce.courses.length;
                                for (var i = 0; i < len; i++) {
                                    var course_title = responce.courses[i].title;
                                    var course_id = responce.courses[i].id;
                                    var tr_str = "<option value="+course_id+">"+course_title+"</option>";
                                    $("#course").append(tr_str);
                                }

                                $('#room').html('<option value="">Select Room</option>');
                                var len = responce.rooms.length;
                                for (var i = 0; i < len; i++) {
                                    var room_id = responce.rooms[i].id;
                                    var room_no = responce.rooms[i].room_no;
                                    var capacity = responce.rooms[i].capacity;
                                    var tr_str = "<option value="+room_id+">"+room_no+ "("+ capacity +")"+ "</option>";
                                    $("#room").append(tr_str);
                                }

                                $('#teacher').html('<option value="">Select Teacher</option>');
                                var len = responce.teachers.length;
                                for (var i = 0; i < len; i++) {
                                    var teacher_name = responce.teachers[i].name;
                                    var teacher_id = responce.teachers[i].id;
                                    var tr_str = "<option value="+teacher_id+">"+teacher_name+"</option>";
                                    $("#teacher").append(tr_str);
                                }

                                $('#batches').html();
                                var len = responce.batches.length;
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


