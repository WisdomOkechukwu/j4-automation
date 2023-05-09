<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Models\FieldWorkerSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FieldWorkersTrackingsOverviewController extends Controller
{
    public function fieldWorkerOverview($month = null, $year = null)
    {
        try {
            $month = $month ?: now()->month;
            $year = $year ?: now()->year;

            $firstDayOfTheMonth = "$year-$month-01";

            $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $daysInAMonth = $startOfMonth->copy()->daysInMonth;
            $segment = $startOfMonth->format('F Y');

            $currentMonth = $this->generateFieldWorkerCalendar($month, $year);

            $calendar = CalendarHelperController::calendarGenerator();
            $months = $calendar[1];
            $years = $calendar[0];

            $noOfWeeks = (new ScheduleFieldController())->noOfWeeks($currentMonth);
            return view('admin.field_worker_schedule_overview', compact(['currentMonth', 'segment', 'months', 'years', 'noOfWeeks']));
        } catch (\Exception $exception) {
            logger('Field Worker Overview Error ' . $exception->getMessage());
        }
    }

    public function generateFieldWorkerCalendar($month, $year)
    {
        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // check schedule
        $fieldWorkerSchedule = FieldWorkerSchedule::with('user')
            ->where('date', '>=', $startOfMonth)
            ->where('date', '<=', $endOfMonth)
            ->get();

        $daysOfTheWeek = date('w', strtotime($firstDayOfTheMonth));
        $fieldData = [];

        for ($i = 1; $i < $daysOfTheWeek; $i++) {
            $fieldData[] = [
                'day' => 0,
                'users' => [],
            ];
        }

        $numberOfDays = date('t', strtotime($firstDayOfTheMonth));
        for ($i = 1; $i <= $numberOfDays; $i++) {
            $day = Carbon::parse("$year-$month-$i");
            $startOfDay = $day->copy()->startOfDay();
            $endOfDay = $day->copy()->endOfDay();

            $todaysSchedule = $fieldWorkerSchedule->where('date', '>=', $startOfDay)->where('date', '<=', $endOfDay);

            //Operators Schedule
            $fieldData[] = [
                'day' => $i,
                'users' => $todaysSchedule,
            ];
        }

        return collect($fieldData)->chunk(7);
    }
}
