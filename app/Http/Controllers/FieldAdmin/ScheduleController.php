<?php

namespace App\Http\Controllers\FieldAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FieldWorker\ScheduleController as FieldWorkerScheduleController;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedule($month = null, $year = null){
        return (new FieldWorkerScheduleController())->schedule($month, $year);
    }
}
