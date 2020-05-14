@extends('layouts.admins.master')
@section('title','Change password')
@section('content')
    <!-- Page-Title or brad-cum-->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Admin Password Change</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="">Change Password</a></li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @include("layouts.admins._message")
    {{--form start--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">Password Change form</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('admin.passwordUpdate',auth()->user()->id)}}" method="post" role="form" enctype= multipart/form-data>
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-md-2 control-label">Old Password</label>
                            <div class="col-md-10">
                                <input type="password" value="{{ old('oldPassword') }}" name="oldPassword" class="form-control" placeholder="Old Password" required>
                                @error('oldPassword')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">New Password</label>
                            <div class="col-md-10">
                                <input type="password" value="{{ old('newPassword') }}" name="newPassword" class="form-control" placeholder="New Password" required>
                                @error('newPassword')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Confirm Password</label>
                            <div class="col-md-10">
                                <input type="password" value="{{ old('confirmPassword') }}" name="confirmPassword" class="form-control" placeholder="Confirm New Password" required>
                                @error('confirmPassword')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <input type="submit"  class="btn btn-info full-right" value="Change Password">
                    </form>
                </div> <!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col -->
    </div> <!-- End row -->
@endsection