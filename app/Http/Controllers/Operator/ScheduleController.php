<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Admin\ScheduleOperatorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function schedule($month = null, $year = null)
    {
        try {
            $user = Auth::user();
            $month = $month ?: now()->month;
            $year = $year ?: now()->year;

            $firstDayOfTheMonth = "$year-$month-01";
            $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $segment = $startOfMonth->format('F Y');

            $schedule = (new ScheduleOperatorController())->generateOperatorCalendar($month, $year, $user);

            $calendar = CalendarHelperController::calendarGenerator();
            $months = $calendar[1];
            $years = $calendar[0];

            $days = $schedule['days'];
            $mealTicket = $schedule['mealTickets'];

            //rework on this view
            return view('operator.schedule', compact(['days', 'mealTicket', 'months', 'years', 'segment', 'month', 'year', 'user']));
        } catch (\Exception $exception) {
            logger('Operator Schedule Error ' . $exception->getMessage());
        }
    }
}
