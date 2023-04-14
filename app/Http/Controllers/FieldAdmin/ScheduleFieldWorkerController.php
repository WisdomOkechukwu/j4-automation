<?php

namespace App\Http\Controllers\FieldAdmin;

use App\Http\Controllers\Admin\ScheduleFieldController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleFieldWorkerController extends Controller
{
    public function allSchedules()
    {
        $users = User::with('role')
            ->where('role_id', 777)
            ->get();

        return view('field.field-workers', compact(['users']));
    }

    public function scheduleFieldWorker(User $user, $month = null, $year = null)
    {
        $month = $month ?: now()->month;
        $year = $year ?: now()->year;

        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $daysInAMonth = $startOfMonth->copy()->daysInMonth;
        $segment = $startOfMonth->format('F Y');

        $days = (new ScheduleFieldController())->generateFieldWorkerCalendar($month, $year, $user);

        $calendar = CalendarHelperController::calendarGenerator();
        $months = $calendar[1];
        $years = $calendar[0];

        $noOfWeeks = (new ScheduleFieldController())->noOfWeeks($days);
        return view('field.schedule_field_worker', compact(['days', 'months', 'years', 'segment', 'month', 'year', 'user', 'noOfWeeks', 'daysInAMonth']));
    }

    public function scheduleFieldWorkerAction(Request $request)
    {
        return (new ScheduleFieldController())->scheduleFieldWorkerAction($request);
    }

}
