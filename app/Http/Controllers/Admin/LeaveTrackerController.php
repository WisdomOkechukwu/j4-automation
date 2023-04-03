<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeaveTrackerController extends Controller
{
    public function leaveTracker(){
        return view('admin.leave_tracker');
    }
}
