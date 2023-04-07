<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Models\FieldWorkerSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleFieldController extends Controller
{
    public function scheduleFieldWorker(User $user, $month = null, $year = null)
    {
        $month = $month ?: now()->month;
        $year = $year ?: now()->year;

        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $segment = $startOfMonth->format('F Y');

        $days = $this->generateFieldWorkerCalendar($month, $year, $user);
        // dd($days);

        $calendar = CalendarHelperController::calendarGenerator();
        $months = $calendar[1];
        $years = $calendar[0];

        $noOfWeeks = $this->noOfWeeks($days);
        return view('admin.schedule_field_worker', compact(['days', 'months', 'years', 'segment', 'month', 'year', 'user', 'noOfWeeks']));
    }

    public function scheduleFieldWorkerAction(Request $request)
    {
        dd($request->all());
    }

    public function generateFieldWorkerCalendar($month, $year, $user)
    {
        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // check schedule
        $fieldWorkerSchedule = FieldWorkerSchedule::where('user_id', $user->id)
            ->where('date', '>=', $startOfMonth)
            ->where('date', '<=', $endOfMonth)
            ->get();

        $daysOfTheWeek = date('w', strtotime($firstDayOfTheMonth));
        $operatorData = [];

        for ($i = 1; $i < $daysOfTheWeek; $i++) {
            $operatorData[] = null;
        }

        $numberOfDays = date('t', strtotime($firstDayOfTheMonth));
        for ($i = 1; $i <= $numberOfDays; $i++) {
            $day = Carbon::parse("$year-$month-$i");
            $startOfDay = $day->copy()->startOfDay();
            $endOfDay = $day->copy()->endOfDay();

            $todaysSchedule = $fieldWorkerSchedule
                ->where('date', '>=', $startOfDay)
                ->where('date', '<=', $endOfDay)
                ->first();

            //Operators Schedule
            $operatorData[] = [
                'day' => $i,
                'date' => $day->format('jS M'),
                'weekday' => $day->format('l'),
                'shift' => $todaysSchedule ? $todaysSchedule->shift : null,
                'is_meal' => $todaysSchedule ? $todaysSchedule->is_meal : 0,
                'meal_name' => $todaysSchedule ? $todaysSchedule->meal_name : null,
            ];
        }

        return collect($operatorData)->chunk(7);
    }

    public function noOfWeeks($days)
    {
        $noOfWeeks = [];
        for ($i = 1; $i <= $days->count(); $i++) {
            if ($i == 1) {
                $noOfWeeks[] = [
                    'weekNo' => $i,
                    'name' => 'First Week',
                ];
            }

            if ($i == 2) {
                $noOfWeeks[] = [
                    'weekNo' => $i,
                    'name' => 'Second Week',
                ];
            }

            if ($i == 3) {
                $noOfWeeks[] = [
                    'weekNo' => $i,
                    'name' => 'Third Week',
                ];
            }

            if ($i == 4) {
                $noOfWeeks[] = [
                    'weekNo' => $i,
                    'name' => 'Fourth Week',
                ];
            }

            if ($i == 5) {
                $noOfWeeks[] = [
                    'weekNo' => $i,
                    'name' => 'Fifth Week',
                ];
            }
        }
        return $noOfWeeks;
    }
}
