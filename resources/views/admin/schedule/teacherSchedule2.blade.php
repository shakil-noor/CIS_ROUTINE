<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <link href="{{ asset('assets/schedule/css/style.css') }}" rel="stylesheet" type="text/css">
    {{-- <link href="https://codyhouse.co/demo/schedule-template/assets/css/style.css" rel="stylesheet" type="text/css"> --}}

    <title>CIS-Class Routine-{{ $teacher->name }}</title>
</head>
<body>
<div id="printableArea">
<header class="cd-main-header text-center flex flex-column flex-center">
    <h1 class="text-xl">Class Schedule of {{ $teacher->name }}</h1>
    {{--<button onclick="window.print()">Print</button>--}}
    <input type="button" onclick="printDiv('printableArea')" value="print a div!" />
</header>

<div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
    <ul>
        <li>
            <div class="cd-schedule__timeline">
                <ul>
                    <li><span>09:00</span></li>
                    <li><span>09:30</span></li>
                    <li><span>10:00</span></li>
                    <li><span>10:30</span></li>
                    <li><span>11:00</span></li>
                    <li><span>11:30</span></li>
                    <li><span>12:00</span></li>
                    <li><span>12:30</span></li>
                    <li><span>13:00</span></li>
                    <li><span>13:30</span></li>
                    <li><span>14:00</span></li>
                    <li><span>14:30</span></li>
                    <li><span>15:00</span></li>
                    <li><span>15:30</span></li>
                    <li><span>16:00</span></li>
                    <li><span>16:30</span></li>
                    <li><span>17:00</span></li>
                    <li><span>17:30</span></li>
                    <li><span>18:00</span></li>
                </ul>
            </div> <!-- .cd-schedule__timeline -->
        </li>
        <li>
            <div class="cd-schedule__events">
                <ul>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info"><span>Saturday</span></div>

                        <ul>
                            @foreach($saturday as  $sat)
                                <div>
                                    <li class="cd-schedule__event">
                                        <a class="" data-start="{{ $sat->start_time }}" data-end="{{ $sat->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                            <em class="cd-schedule__name">{{ $sat->course->title }}</em>
                                            <span class="cd-schedule__room">{{ $sat->room->room_no }}</span>
                                            <span style="display: none">{{ route('classSchedule.edit',$sat->id) }}</span>
                                            <span style="display: none">{{ route('classSchedule.destroy',$sat->id) }}</span>
                                            @foreach($sat->batchSchedules as $bt)
                                             <span class="bt" style="display: none">{{ $bt->batch->name }}</span>
                                            @endforeach
                                            <em class="day" style="display: none">Saturday</em>
                                        </a>

                                    </li>
                                </div>
                            @endforeach
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info"><span>Sunday</span></div>

                        <ul>
                            @foreach($sunday as  $sun)
                                <li class="cd-schedule__event">
                                    <a class="" data-start="{{ $sun->start_time }}" data-end="{{ $sun->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                        <em class="cd-schedule__name">{{ $sun->course->title }}</em>
                                        <span class="cd-schedule__room">{{ $sun->room->room_no }}</span>
                                        <span style="display: none">{{ route('classSchedule.edit',$sun->id) }}</span>
                                        <span style="display: none">{{ route('classSchedule.destroy',$sun->id) }}</span>
                                        @foreach($sun->batchSchedules as $bt)
                                            <span class="bt" style="display: none">{{ $bt->batch->name }}</span>
                                        @endforeach
                                        <em class="day" style="display: none">Sunday</em>
                                    </a>

                                </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info"><span>Monday</span></div>

                        <ul>
                            @foreach($monday as  $mon)
                                <li class="cd-schedule__event">
                                    <a class="" data-start="{{ $mon->start_time }}" data-end="{{ $mon->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                        <em class="cd-schedule__name">{{ $mon->course->title }}</em>
                                        <span class="cd-schedule__room">{{ $mon->room->room_no }}</span>
                                        <span style="display: none">{{ route('classSchedule.edit',$mon->id) }}</span>
                                        <span style="display: none">{{ route('classSchedule.destroy',$mon->id) }}</span>
                                        @foreach($mon->batchSchedules as $bt)
                                            <span class="bt" style="display: none">{{ $bt->batch->name }}</span>
                                        @endforeach
                                        <em class="day" style="display: none">Monday</em>
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info"><span>Tuesday</span></div>

                        <ul>

                            @foreach($tuesday as  $tues)
                                <li class="cd-schedule__event">
                                    <a class="" data-start="{{ $tues->start_time }}" data-end="{{ $tues->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                        <em class="cd-schedule__name">{{ $tues->course->title }}</em>
                                        <span class="cd-schedule__room">{{ $tues->room->room_no }}</span>
                                        <span style="display: none">{{ route('classSchedule.edit',$tues->id) }}</span>
                                        <span style="display: none">{{ route('classSchedule.destroy',$tues->id) }}</span>
                                        @foreach($tues->batchSchedules as $bt)
                                            <span class="bt" style="display: none">{{ $bt->batch->name }}</span>
                                        @endforeach
                                        <em class="day" style="display: none">Tuesday</em>
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info"><span>Wednesday</span></div>

                        <ul>
                            @foreach($wednesday as  $wed)
                                <li class="cd-schedule__event">
                                    <a class="" data-start="{{ $wed->start_time }}" data-end="{{ $wed->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                        <em class="cd-schedule__name">{{ $wed->course->title }}</em>
                                        <span class="cd-schedule__room">{{ $wed->room->room_no }}</span>
                                        <span style="display: none">{{ route('classSchedule.edit',$wed->id) }}</span>
                                        <span style="display: none">{{ route('classSchedule.destroy',$wed->id) }}</span>
                                        @foreach($wed->batchSchedules as $bt)
                                            <span class="bt" style="display: none">{{ $bt->batch->name }}</span>
                                        @endforeach
                                        <em class="day" style="display: none">Wednesday</em>
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="cd-schedule__group">
                        <div class="cd-schedule__top-info"><span>Thursday</span></div>

                        <ul>
                            @foreach($thursday as  $thrus)
                                <li class="cd-schedule__event">
                                    <a class="" data-start="{{ $thurs->start_time }}" data-end="{{ $thurs->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                        <em class="cd-schedule__name">{{ $thurs->course->title }}</em>
                                        <span class="cd-schedule__room">{{ $thurs->room->room_no }}</span>
                                        <span style="display: none">{{ route('classSchedule.edit',$thurs->id) }}</span>
                                        <span style="display: none">{{ route('classSchedule.destroy',$thurs->id) }}</span>
                                        @foreach($thurs->batchSchedules as $bt)
                                            <span class="bt" style="display: none">{{ $bt->batch->name }}</span>
                                        @endforeach
                                        <em class="day" style="display: none">Thursday</em>
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div class="cd-schedule-modal">
        <header class="cd-schedule-modal__header">
            <div class="cd-schedule-modal__content">
                <h3 class="cd-schedule-modal__day"></h3>
                <span class="cd-schedule-modal__date"></span>
                <h3 class="cd-schedule-modal__name"></h3>
                <span class="cd-schedule-modal__room">Room-</span>
                <div>
                    Batches:
                    <span class="cd-schedule-modal__batch"></span>
                </div>
                <div>
                    <a class="cd-schedule-modal__edit"></a>
                </div>
                <div>
                    <form class="cd-schedule-modal__delete" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                    </form>
                </div>
            </div>

            <div class="cd-schedule-modal__header-bg"></div>
        </header>

        <div class="cd-schedule-modal__body">
            <div class="cd-schedule-modal__event-info" style="color: #1d2124">

            </div>
            <div class="cd-schedule-modal__body-bg"></div>
        </div>

        <a href="#0" class="cd-schedule-modal__close text-replace">Close</a>
    </div>

    <div class="cd-schedule__cover-layer"></div>
</div> <!-- .cd-schedule -->
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
{{--<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->--}}
{{--<script src="assets/js/main.js"></script>--}}
<script src="{{ asset('assets/schedule/js/util.js')}}"></script>
<script src="{{ asset('assets/schedule/js/main.js')}}"></script>
</body>
</html>
