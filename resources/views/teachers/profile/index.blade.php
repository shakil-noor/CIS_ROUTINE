@extends('layouts.teachers.master')
@section('title','Profile')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Teacher Profile</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
                    <li class="active">Profile</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @include("layouts.coordinators._message")
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png" alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <div class="row">
                            <div class="col-md-9">
                                <h2>{{ auth()->user()->name }}</h2>
                            </div>
                            <div class="col-md-3"><div class="dropdown">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">
                                        <button type="button" class="btn btn-info waves-effect">Modify <i class="ti-arrow-circle-down"></i></button>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('teacherProfile.edit',auth()->user()->id) }}"> Edit Profile</a></li>
                                        <li><a href="{{ route('teacher.passwordEdit') }}"> Change Password</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <ul class="container details">
                        <li><p><b>Designation:</b> {{ auth()->user()->designation }}</p></li>
                        <li><p><b>Email:</b> {{ auth()->user()->email }}</p></li>
                        <li><p><b>Username:</b> {{ auth()->user()->username }}</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection