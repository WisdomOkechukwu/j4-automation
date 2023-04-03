<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperatorsScheduleOverviewController extends Controller
{
    public function operatorOverview(){
        return view('admin.operators_schedule_overview');
    }
}
