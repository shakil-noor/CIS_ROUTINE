@extends('layouts.admins.master')
@section('title','New batch create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Batches</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Batch create</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Batch create form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('batch.store')}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Batch Name</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Batch Name" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Number Of Student</label>
                            <div class="col-md-10">
                                <input type="number" value="{{ old('num_of_std') }}" name="num_of_std" class="form-control" placeholder="Number Of Student" required>
                                @error('num_of_std')
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

                        <input type="submit"  class="btn btn-info full-right" value="Submit">
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- End row -->
@endsection
