@extends('layouts.coordinators.master')
@section('title','Class Schedule')
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
                                @foreach($teachers as $key => $teacher)
                                    <tr>
                                        <td>{{ $teachers->firstItem() + $key }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td><a type="button" target="_blank" href="{{ route('coordinator.teacherSchedule', $teacher->id) }}" class="btn btn-primary">View</a></td>
                                        <td><a type="button" target="_blank" href="{{ route('coordinator.teacherSchedulePDF', $teacher->id) }}" class="btn btn-info">PDF</a></td>
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
                                        <td>{{ $b->name }}</td>
                                        <td><a type="button" target="_blank" href="{{ route('coordinator.batchSchedule',$b->id) }}" class="btn btn-primary">View</a></td>
                                        <td><a type="button" target="_blank" href="" class="btn btn-info">PDF</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $batches->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Row -->

@endsection