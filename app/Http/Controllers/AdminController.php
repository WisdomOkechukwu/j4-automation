<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function allSchedules(){
        return view('admin.all_schedules');
    }

    public function scheduleOperator(){
        return view('admin.schedule_operator');
    }

    public function scheduleFieldWorker(){
        return view('admin.schedule_field_worker');
    }

    public function operatorOverview(){
        return view('admin.operators_schedule_overview');
    }

    public function fieldWorkerOverview(){
        return view('admin.field_worker_schedule_overview');
    }

    public function allUsers(){
        return view('admin.users');
    }

    public function leaveTracker(){
        return view('admin.leave_tracker');
    }

    public function assignTicket(){
        return view('admin.assign_tickets');
    }

    public function userProfile(){
        return view('admin.user_profile');
    }

    public function userMessage(){
        return view('admin.user_message');
    }
}
