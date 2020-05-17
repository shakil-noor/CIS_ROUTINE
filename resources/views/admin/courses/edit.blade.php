@extends('layouts.admins.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Course</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Course Edit</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Course Edit form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('course.update',$course->id)}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('title',isset($course->title)?$course->title:null) }}" name="title" class="form-control" placeholder="Title" required>
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Short Name</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('short_name',isset($course->short_name)?$course->short_name:null) }}" name="short_name" class="form-control" placeholder="Short Name" required>
                                @error('short_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Course Code</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('course_code',isset($course->course_code)?$course->course_code:null) }}" name="course_code" class="form-control" placeholder="Course Code" required>
                                @error('course_code')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="course_type">
                                    <option value="">Select Course Type</option>
                                    <option @if(isset($course->course_type) && $course->course_type=='Theory') selected @endif @if(old('course_type')=='Theory')selected @endif value="Theory">Theory</option>
                                    <option @if(isset($course->course_type) && $course->course_typee=='Lab') selected @endif @if(old('course_type')=='Lab')selected @endif value="Lab">Lab</option>
                                </select>
                                @error('course_type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Credit</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="credit">
                                    <option>Select Credit</option>
                                    <option @if(isset($course->credit) && $course->credit== '1') selected @endif @if(old('credit')=='1')selected @endif value="1">1</option>
                                    <option @if(isset($course->credit) && $course->credit== '2') selected @endif @if(old('credit')=='2')selected @endif value="2">2</option>
                                    <option @if(isset($course->credit) && $course->credit== '3') selected @endif @if(old('credit')=='3')selected @endif value="3">3</option>
                                    <option @if(isset($course->credit) && $course->credit== '4') selected @endif @if(old('credit')=='4')selected @endif value="4">4</option>
                                    <option @if(isset($course->credit) && $course->credit== '5') selected @endif @if(old('credit')=='5')selected @endif value="5">5</option>
                                    <option @if(isset($course->credit) && $course->credit== '6') selected @endif @if(old('credit')=='6')selected @endif value="6">6</option>
                                </select>
                                @error('credit')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>




                        <input type="submit"  class="btn btn-info full-right" value="Update">
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- End row -->
@endsection
