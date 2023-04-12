<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Models\OperatorSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OperatorsScheduleOverviewController extends Controller
{
    public function operatorOverview($month = null, $year = null)
    {
        $month = $month ?: now()->month;
        $year = $year ?: now()->year;

        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $daysInAMonth = $startOfMonth->copy()->daysInMonth;
        $segment = $startOfMonth->format('F Y');

        $currentMonth = $this->generateOperatorCalendar($month, $year);

        $calendar = CalendarHelperController::calendarGenerator();
        $months = $calendar[1];
        $years = $calendar[0];

        $noOfWeeks = (new ScheduleFieldController)->noOfWeeks($currentMonth);

        return view('admin.operators_schedule_overview', compact(['currentMonth', 'segment', 'months', 'years', 'noOfWeeks']));
    }

    public function generateOperatorCalendar($month, $year)
    {
        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // check schedule
        $operatorsSchedule = OperatorSchedule::with('user')
            ->where('date', '>=', $startOfMonth)
            ->where('date', '<=', $endOfMonth)
            ->get();

        $daysOfTheWeek = date('w', strtotime($firstDayOfTheMonth));
        $operatorData = [];

        for ($i = 1; $i < $daysOfTheWeek; $i++) {
            $operatorData[] = [
                'day' => 0,
                'users' => [],
            ];
        }

        $numberOfDays = date('t', strtotime($firstDayOfTheMonth));
        for ($i = 1; $i <= $numberOfDays; $i++) {
            $day = Carbon::parse("$year-$month-$i");
            $startOfDay = $day->copy()->startOfDay();
            $endOfDay = $day->copy()->endOfDay();

            $todaysSchedule = $operatorsSchedule->where('date', '>=', $startOfDay)->where('date', '<=', $endOfDay);

            //Operators Schedule
            $operatorData[] = [
                'day' => $i,
                'users' => $todaysSchedule,
            ];
        }

        return collect($operatorData)->chunk(7);
    }
}
