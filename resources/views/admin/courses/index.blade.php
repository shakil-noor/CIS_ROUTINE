@extends('layouts.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Course</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Courses</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @include("layouts._message")
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Course List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Short Name</th>
                                        <th>Course Code</th>
                                        <th>Course Type</th>
                                        <th>Credit</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($courses as $key => $course)
                                        <tr>
                                            <td>{{ $courses->firstItem() + $key }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>{{ $course->short_name }}</td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->course_type }}</td>
                                            <td>{{ $course->credit }}</td>
                                            <td>
                                                <a type="button" href="{{ route('course.edit',$course->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('course.destroy',$course->id) }}" method="post">
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
                                    {{ $courses->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection