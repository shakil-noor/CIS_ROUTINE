@extends('layouts.admins.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Teacher</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Teacher Edit</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Teacher Edit form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('teacher.update',$teacher->id)}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-md-2 control-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name',isset($teacher->name)?$teacher->name:null) }}" name="name" class="form-control" placeholder="Name" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Designation</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="designation">
                                    <option>Select Designation</option>
                                    <option @if(isset($teacher->designation) && $teacher->designation=='Professor') selected @endif @if(old('designation')=='Professor')selected @endif value="Professor">Professor</option>
                                    <option @if(isset($teacher->designation) && $teacher->designation=='Associate Professor') selected @endif @if(old('designation')=='Associate Professor')selected @endif value="Associate Professor">Associate Professor</option>
                                    <option @if(isset($teacher->designation) && $teacher->designation=='Assistant Professor') selected @endif @if(old('designation')=='Assistant Professor')selected @endif value="Assistant Professor">Assistant Professor</option>
                                    <option @if(isset($teacher->designation) && $teacher->designation=='Sr. Lecturer') selected @endif @if(old('designation')=='Sr. Lecturer')selected @endif value="Sr. Lecturer">Sr. Lecturer</option>
                                    <option @if(isset($teacher->designation) && $teacher->designation=='Lecturer') selected @endif @if(old('designation')=='Lecturer')selected @endif value="Lecturer">Lecturer</option>
                                </select>
                                @error('designation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('email',isset($teacher->email)?$teacher->email:null) }}" name="email" class="form-control" placeholder="Email" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('username',isset($teacher->username)?$teacher->username:null) }}" name="username" class="form-control" placeholder="Username" required>
                                @error('username')
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
