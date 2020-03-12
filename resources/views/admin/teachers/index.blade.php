@extends('layouts.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Teacher</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('teacher.create') }}">Teacher create</a></li>
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
                    <h3 class="panel-title">Teachers List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teachers as $key => $teacher)
                                    <tr>
                                        <td>{{ $teachers->firstItem() + $key }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->designation }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->username }}</td>
                                        <td>
                                            <a type="button" href="{{ route('teacher.edit',$teacher->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('teacher.destroy',$teacher->id) }}" method="post">
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
                                    {{ $teachers->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection