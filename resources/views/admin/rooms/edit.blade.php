@extends('layouts.master')
@section('title','New Teacher create')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Class Rooms</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Room Edit</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Room Edit form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('room.update',$room->id)}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Room Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="room_type">
                                    <option value="">Select Room Type</option>
                                    <option value="Theory">Theory</option>
                                    <option value="Lab">Lab</option>
                                </select>
                                @error('room_type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Room No</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('room_no',isset($room->room_no)?$room->room_no:null) }}" name="room_no" class="form-control" placeholder="Room No" required>
                                @error('room_no')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Capacity</label>
                            <div class="col-md-10">
                                <input type="number" value="{{ old('capacity',isset($room->capacity)?$room->capacity:null) }}" name="capacity" class="form-control" placeholder="Capacity" required>
                                @error('capacity')
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
