<?php

namespace App\Http\Controllers\FieldWorker;

use App\Http\Controllers\Admin\ScheduleOperatorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function schedule($month = null, $year = null){
        $user = Auth::user();
        $month = $month ?: now()->month;
        $year = $year ?: now()->year;

        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $daysInAMonth = $startOfMonth->copy()->daysInMonth;
        $segment = $startOfMonth->format('F Y');

        $days = (new ScheduleOperatorController())->generateFieldWorkerCalendar($month, $year, $user);

        $calendar = CalendarHelperController::calendarGenerator();
        $months = $calendar[1];
        $years = $calendar[0];

        $noOfWeeks = (new ScheduleOperatorController())->noOfWeeks($days);
        return view('admin.schedule_field_worker', compact(['days', 'months', 'years', 'segment', 'month', 'year', 'user', 'noOfWeeks', 'daysInAMonth']));
    }
}
