<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(){
        return view('teachers.schedules.index'); //view all semesters routine
    }

    public function view(){
        return view('teachers.schedule.view'); // view specific semester's routine
    }
}
