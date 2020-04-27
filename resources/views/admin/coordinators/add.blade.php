@extends('layouts.admins.master')
@section('title','New Coordinator create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Coordinator</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('coordinator.create') }}">Coordinator create</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Coordinator create form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('coordinator.store')}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Name" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Department</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="department_id">
                                    <option value="" disabled selected>Select </option>
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
                            <label class="col-md-2 control-label">Email</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Username</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('username') }}" name="username" class="form-control" placeholder="Username" required>
                                @error('username')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Password</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('password') }}" name="password" class="form-control" placeholder="Password" required>
                                @error('password')
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
