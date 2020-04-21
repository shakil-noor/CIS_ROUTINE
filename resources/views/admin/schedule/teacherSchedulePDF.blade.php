<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <!-- <link href="{{ asset('assets/schedule/css/style.css') }}" rel="stylesheet" type="text/css"> -->
    {{--<link href="https://codyhouse.co/demo/schedule-template/assets/css/style.css" rel="stylesheet" type="text/css">--}}
    <title>CIS-Class Routine-{{ $teacher->name }}</title>
</head>
<body>
<div id="printableArea">
<header class="cd-main-header text-center flex flex-column flex-center">

    <h1 class="text-xl">Class Schedule of {{ $teacher->name }}</h1>

    <input type="button" onclick="printDiv('printableArea')" value="print a div!" />
</header>

<div class="cd-schedule cd-schedule--loading margin-top-lg margin-bottom-lg js-cd-schedule">
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

    <div class="cd-schedule__events">
        <ul>

            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info"><span>Saturday</span></div>

                <ul>
                    @foreach($saturday as  $sat)
                        <li class="cd-schedule__event">
                            <a data-start="{{ $sat->start_time }}" data-end="{{ $sat->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $sat->course->title }}</em>
                                {{ $sat->room->room_no }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="cd-schedule__group">
                <div class="cd-schedule__top-info"><span>Sunday</span></div>

                <ul>
                    @foreach($sunday as  $sun)
                        <li class="cd-schedule__event">
                            <a data-start="{{ $sun->start_time }}" data-end="{{ $sun->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $sun->course->title }}</em>
                                {{ $sun->room->room_no }}
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
                            <a data-start="{{ $mon->start_time }}" data-end="{{ $mon->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $mon->course->title }}</em>
                                {{ $mon->room->room_no }}
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
                            <a data-start="{{ $tues->start_time }}" data-end="{{ $tues->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $tues->course->title }}</em>
                                {{ $tues->room->room_no }}
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
                            <a data-start="{{ $wed->start_time }}" data-end="{{ $wed->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $wed->course->title }}</em>
                                {{ $wed->room->room_no }}
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
                            <a data-start="{{ $thrus->start_time }}" data-end="{{ $thrus->end_time }}" data-content="event-abs-circuit" data-event="event-1" href="#0">
                                <em class="cd-schedule__name">{{ $thrus->course->title }}</em>
                                {{ $thrus->room->room_no }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>


        </ul>
    </div>

    <div class="cd-schedule-modal">
        <header class="cd-schedule-modal__header">
            <div class="cd-schedule-modal__content">
                <span class="cd-schedule-modal__date"></span>
                <h3 class="cd-schedule-modal__name"></h3>
            </div>

            <div class="cd-schedule-modal__header-bg"></div>
        </header>

        <div class="cd-schedule-modal__body">
            <div class="cd-schedule-modal__event-info"></div>
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
<script src="{{ asset('assets/schedule/js/util.js')}}"></script>
<script src="{{ asset('assets/schedule/js/main.js')}}"></script>
</body>
</html>