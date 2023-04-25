<?php

namespace App\Http\Controllers\FieldWorker;

use App\Http\Controllers\Controller;
use App\Models\EngineeringSchedule;
use App\Models\FieldWorkerSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        //schedule for the week
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $fieldWorkerSchedule = FieldWorkerSchedule::where('user_id', Auth::user()->id)
            ->where('date', '>=', $startOfWeek)
            ->where('date', '<=', $endOfWeek)
            ->get();

        $EngineeringSchedule = EngineeringSchedule::where('user_id', Auth::user()->id)
            ->where('date', '>=', $startOfWeek)
            ->where('date', '<=', $endOfWeek)
            ->get();
        
        //leave tracker

        return view('field.index',compact(['fieldWorkerSchedule','EngineeringSchedule']));
    }
}
