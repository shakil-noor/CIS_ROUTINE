@extends('layouts.master')
@section('title','Class Schedules')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Batch Schedule</h3>
                </div>
                <div class="panel-body">
                    @foreach($batches as $b)
                        <div class="panel-body">
                        {{ $b->name }} =
                        <a type="button" href="{{ route('batchSchedule',$b->id) }}" class="btn btn-primary">View Schedule</a><br>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Teacher's Schedule</h3>
                </div>
                <div class="panel-body">
                    @foreach($teachers as $key => $T)
                        <div class="panel-body">
                            {{ $T->name }} =
                            <a type="button" href="{{ route('teacherSchedule', $T->id) }}" class="btn btn-primary">View</a>
                            <a type="button" href="{{ route('teacherSchedulePDF', $T->id) }}" class="btn btn-info">PDF</a>

                            {{-- <input type="button" class="btn btn-primary" name="teacherPDF" value="PDF"> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection