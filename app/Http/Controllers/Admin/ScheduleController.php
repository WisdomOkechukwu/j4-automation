<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
