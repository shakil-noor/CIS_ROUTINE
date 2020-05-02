@extends('layouts.admins.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Semester</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Semesters</a></li>
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
                    <h3 class="panel-title">Semester List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Semester name</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($semesters as $key => $semester)
                                        <tr>
                                            <td>{{ $semesters->firstItem() + $key }}</td>
                                            <td>{{ $semester->name }}</td>
                                            <td>{{ $semester->status }}</td>
                                            <td>
                                                <a type="button" href="{{ route('semester.edit',$semester->id) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('semester.destroy',$semester->id) }}" method="post">
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
                                    {{ $semesters->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection