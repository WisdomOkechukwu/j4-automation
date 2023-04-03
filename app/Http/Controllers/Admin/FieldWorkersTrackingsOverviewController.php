<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FieldWorkersTrackingsOverviewController extends Controller
{
    public function fieldWorkerOverview(){
        return view('admin.field_worker_schedule_overview');
    }
}
