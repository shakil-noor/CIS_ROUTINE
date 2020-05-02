@extends('layouts.admins.master')
@section('title','New Semester create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Semester</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Semester create</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Semester create form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('semester.store')}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        <div class="form-group">
                            <label class="col-md-2 control-label">Semester Name</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Semester Name" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Select Status</option>
                                    <option @if(old('status')=='Active')selected @endif  value="Active">Active</option>
                                    <option @if(old('status')=='Inactive')selected @endif value="Inactive">Inactive</option>
                                </select>
                                @error('status')
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
