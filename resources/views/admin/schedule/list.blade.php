@extends('layouts.admins.master')
@section('title','Class Schedules')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Teacher's Schedule</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Teacher Name</th>
                                    <th>View</th>
                                    <th>PDF</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teachers as $key => $T)
                                    <tr>
                                        <td>{{ $teachers->firstItem() + $key }}</td>
                                        {{--<td></td>--}}
                                        <td>{{ $T->name }}</td>
                                        <td><a type="button" href="{{ route('teacherSchedule', $T->id) }}" class="btn btn-primary">View</a></td>
                                        <td><a type="button" href="{{ route('teacherSchedulePDF', $T->id) }}" class="btn btn-info">PDF</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Batch's Schedule</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Batch Name</th>
                                    <th>View</th>
                                    <th>PDF</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($batches as $key => $b)
                                    <tr>
                                        <td>{{ $batches->firstItem() + $key }}</td>
                                        {{--<td>1</td>--}}
                                        <td>{{ $b->name }}</td>
                                        <td><a type="button" href="{{ route('batchSchedule',$b->id) }}" class="btn btn-primary">View</a></td>
                                        <td><a type="button" href="" class="btn btn-info">PDF</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->

@endsection