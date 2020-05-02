@extends('layouts.teachers.master')
@section('datatablecss')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('title','Teacher Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">Dashboard</h4>
                <ol class="breadcrumb pull-right">
                    <li class="active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Today's Schedule - {{ date('l', strtotime(date('Y-m-d'))) }}</h3>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->
    <div class="row">
        {{--{{count($schedules)}}--}}
        @if(count($schedules)>0)

            @foreach($schedules as $schedule)
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">{{ $schedule->course->title }}</h4>
                        </div>
                        <div class="panel-body">
                            <h4 class="">{{ $schedule->start_time }} - {{ $schedule->end_time }}</h4>
                            <p class="text-muted"><b>Room No: </b> {{ $schedule->room->room_no }}</p>
                            <p class="text-muted"><b>Department: </b> {{ $schedule->department->name }}</p>
                            <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h2>There is no class today</h2>
        @endif
    </div>
@endsection
