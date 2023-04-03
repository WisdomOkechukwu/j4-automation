<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function allSchedules(){
        return view('admin.all_schedules');
    }

    public function scheduleOperator(){
        return view('admin.schedule_operator');
    }

    public function scheduleFieldWorker(){
        return view('admin.schedule_field_worker');
    }
}
