@extends('layouts.admins.master')
@section('title','Edit Batch')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Batch</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Batch Edit</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Batch Edit form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('batch.update',$batch->id)}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-md-2 control-label">Title</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('name',isset($batch->name)?$batch->name:null) }}" name="name" class="form-control" placeholder="Name" required>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Number of Student</label>
                            <div class="col-md-10">
                                <input type="text" value="{{ old('num_of_std',isset($batch->num_of_std)?$batch->num_of_std:null) }}" name="num_of_std" class="form-control" placeholder="Number of Student" required>
                                @error('num_of_std')
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
