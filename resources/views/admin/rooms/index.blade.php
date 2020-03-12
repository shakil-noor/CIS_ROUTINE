@extends('layouts.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Class Room</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Rooms</a></li>
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
                    <h3 class="panel-title">Class Room List</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Room Type</th>
                                        <th>Room No</th>
                                        <th>Capacity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rooms as $key => $room)
                                        <tr>
                                            <td>{{ $rooms->firstItem() + $key }}</td>
                                            <td>{{ $room->room_type }}</td>
                                            <td>{{ $room->room_no }}</td>
                                            <td>{{ $room->capacity }}</td>
                                            <td>
                                                <a type="button" href="{{ route('room.edit',$room->id) }}" class="habijabi btn btn-warning" id="habijabi" >Edit</a>
                                                <form action="{{ route('room.destroy',$room->id) }}" method="post">
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
                                    {{ $rooms->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End row -->
@endsection