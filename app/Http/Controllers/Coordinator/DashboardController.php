<?php

namespace App\Http\Controllers\Coordinator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('coordinators.dashboard');
    }
}
