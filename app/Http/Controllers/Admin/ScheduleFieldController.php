<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Http\Controllers\Helper\EmailHelper;
use App\Models\EngineeringSchedule;
use App\Models\FieldWorkerSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleFieldController extends Controller
{
    public function scheduleFieldWorker(User $user, $month = null, $year = null)
    {
        try {
            $month = $month ?: now()->month;
            $year = $year ?: now()->year;

            $firstDayOfTheMonth = "$year-$month-01";

            $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            $daysInAMonth = $startOfMonth->copy()->daysInMonth;
            $segment = $startOfMonth->format('F Y');

            $days = $this->generateFieldWorkerCalendar($month, $year, $user);

            $calendar = CalendarHelperController::calendarGenerator();
            $months = $calendar[1];
            $years = $calendar[0];

            $noOfWeeks = $this->noOfWeeks($days);
            return view('admin.schedule_field_worker', compact(['days', 'months', 'years', 'segment', 'month', 'year', 'user', 'noOfWeeks', 'daysInAMonth']));
        } catch (\Exception $exception) {
            logger('Schedule Field Error ' . $exception->getMessage());
        }
    }

    public function scheduleFieldWorkerAction(Request $request)
    {
        try {
            $count = $request->days_no;
            $year = $request->year;
            $month = $request->month;

            $scheduleData = $request->except('_token', 'month', 'year', 'user', 'days_no');
            $mealData = array_slice($scheduleData, $count);

            foreach (array_chunk($mealData, 2, 'true') as $key => $value) {
                $day = $key + 1;
                $engineering_status = $value['engineering_status_' . $day];
                $meal_data = $value['meal_data_' . $day];

                $scheduleDate = Carbon::parse($year . '-' . $month . '-' . $day);

                $engineeringSchedule = EngineeringSchedule::where('user_id', $request->user)
                    ->whereDate('date', $scheduleDate)
                    ->first();

                if ($engineeringSchedule) {
                    $engineeringSchedule->update([
                        'is_meal' => $engineering_status,
                        'meal_name' => $meal_data,
                    ]);
                } else {
                    $engineeringSchedule = new EngineeringSchedule();
                    $engineeringSchedule->is_meal = $engineering_status != null ? $engineering_status : 'off';
                    $engineeringSchedule->meal_name = $meal_data;
                    $engineeringSchedule->date = $scheduleDate;
                    $engineeringSchedule->user_id = $request->user;
                    $engineeringSchedule->save();
                }
            }

            $dateSchedule = array_diff_key($scheduleData, $mealData);

            foreach ($dateSchedule as $day => $value) {
                $scheduleDate = Carbon::parse($year . '-' . $day);

                $fieldWorkerSchedule = FieldWorkerSchedule::where('user_id', $request->user)
                    ->whereDate('date', $scheduleDate)
                    ->first();

                if ($fieldWorkerSchedule) {
                    $fieldWorkerSchedule->update([
                        'shift' => $value,
                    ]);
                } else {
                    $fieldWorkerSchedule = new FieldWorkerSchedule();
                    $fieldWorkerSchedule->shift = $value != null ? $value : 'od';
                    $fieldWorkerSchedule->date = $scheduleDate;
                    $fieldWorkerSchedule->user_id = $request->user;
                    $fieldWorkerSchedule->save();
                }
            }

            $emailDate = Carbon::parse($year . '-' . $month . '-' . 1);
            $user = User::find($request->user);
            $body = 'Your schedule for ' . $emailDate->format('M Y') . ' has been updated. Click on the button below to view your schedule';
            $subject = 'Schedule Notification';
            $route = route('login');

            if ($user->role_id == 777) {
                $route = route('field.worker.schedule', ['month' => $month, 'year' => $year]);
            } elseif ($user->role_id == 779) {
                $route = route('field.admin.schedule', ['month' => $month, 'year' => $year]);
            }

            EmailHelper::send($user, $subject, $body, true, 'Show Schedule', $route);

            return back()->with('success', 'Data Saved Successfully');
        } catch (\Exception $exception) {
            logger('Schedule Field Action Error ' . $exception->getMessage());
        }
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

        $engineeringSchedule = EngineeringSchedule::where('user_id', $user->id)
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

            $todaysEngineeringSchedule = $engineeringSchedule
                ->where('date', '>=', $startOfDay)
                ->where('date', '<=', $endOfDay)
                ->first();

            //Operators Schedule
            $operatorData[] = [
                'day' => $i,
                'date' => $day->format('jS M'),
                'weekday' => $day->format('l'),
                'shift' => $todaysSchedule ? $todaysSchedule->shift : null,
                'is_meal' => $todaysEngineeringSchedule ? $todaysEngineeringSchedule->is_meal : 0,
                'meal_name' => $todaysEngineeringSchedule ? $todaysEngineeringSchedule->meal_name : null,
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
