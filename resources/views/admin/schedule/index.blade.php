@extends('layouts.admins.master')
@section('title','Class Schedules')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Class Schedule</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Class Schedule</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @include("layouts.admins._message")
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Class Schedule List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Course</th>
                                        <th>Room</th>
                                        <th>Teacher</th>
                                        <th>Batches</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($classSchedules as $key => $CS)
                                        <tr>
                                            <td>{{ $classSchedules->firstItem() + $key }}</td>
                                            <td>{{ $CS->day }}</td>
                                            <td>{{ $CS->start_time }}</td>
                                            <td>{{ $CS->end_time }}</td>
                                            <td>{{ $CS->course->title }}</td>
                                            <td>{{ $CS->room->room_no }}</td>
                                            <td>{{ $CS->teacher->name }}</td>
                                            <td></td>
                                            <td>
                                                <a type="button" href="{{ route('classSchedule.edit',$CS->id) }}" class="habijabi btn btn-warning" id="habijabi" >Edit</a>
                                                <form action="{{ route('classSchedule.destroy',$CS->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    {{--{{ $classSchedules->render() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection