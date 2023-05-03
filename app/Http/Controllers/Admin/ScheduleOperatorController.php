<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Http\Controllers\Helper\EmailHelper;
use App\Models\MealTicket;
use App\Models\OperatorSchedule;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleOperatorController extends Controller
{
    private $user;
    public function scheduleOperator(User $user, $month = null, $year = null)
    {
        $this->user = $user;

        if($this->user->role_id != 889){
            abort(404);
        }

        //loading the Current month
        $month = $month ?: now()->month;
        $year = $year ?: now()->year;

        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $segment = $startOfMonth->format('F Y');

        $schedule = $this->generateOperatorCalendar($month, $year, $user);

        $calendar = CalendarHelperController::calendarGenerator();
        $months = $calendar[1];
        $years = $calendar[0];

        $days = $schedule['days'];
        $mealTicket = $schedule['mealTickets'];

        return view('admin.schedule_operator', compact(['days', 'mealTicket', 'months', 'years', 'segment', 'month', 'year', 'user']));
    }

    public function scheduleOperatorAction(Request $request)
    {
        // dd($request);
        $scheduleData = $request->except('_token', 'user', 'meal_ticket_number', 'meal_ticket_amount', 'year', 'month');
        $year = $request->year;
        $month = $request->month;
        $date = Carbon::parse($year . '-' . $month . '-1');

        $mealTicket = MealTicket::where('user_id', $request->user)
            ->whereDate('date', $date)
            ->first();

        if ($mealTicket) {
            $mealTicket->update([
                'number' => $request->meal_ticket_number,
                'amount' => $request->meal_ticket_amount,
                'date' => $date,
            ]);
        } else {
            $mealTicket = new MealTicket();
            $mealTicket->number = $request->meal_ticket_number;
            $mealTicket->amount = $request->meal_ticket_amount;
            $mealTicket->date = Carbon::parse($date);
            $mealTicket->user_id = $request->user;
            $mealTicket->save();
        }

        foreach ($scheduleData as $key => $sd) {
            $scheduleDate = Carbon::parse($year . '-' . $key);

            $operatorSchedule = OperatorSchedule::where('user_id', $request->user)
                ->whereDate('date', $scheduleDate)
                ->first();

            if ($operatorSchedule) {
                $operatorSchedule->update([
                    'shift' => $sd,
                ]);
            } else {
                $operatorSchedule = new OperatorSchedule();
                $operatorSchedule->shift = ($sd != NULL) ? $sd : 'off';
                $operatorSchedule->date = $scheduleDate;
                $operatorSchedule->user_id = $request->user;
                $operatorSchedule->save();
            }
        }

        $user = User::find($request->user);
        $body = 'Your schedule for '.$date->format('M Y').' has been updated. Click on the button below to view your schedule';
        $subject = 'Schedule Notification';
        $route = route('operator.schedule',['month'=> $month, 'year'=> $year]);

        EmailHelper::send($user, $subject, $body, true, 'Show Schedule', $route);
        return back()->with('success', 'Data Saved Successfully');
    }

    public function generateOperatorCalendar($month, $year, $user)
    {
        $firstDayOfTheMonth = "$year-$month-01";

        $startOfMonth = Carbon::parse($firstDayOfTheMonth)->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        // check schedule
        $operatorsSchedule = OperatorSchedule::where('user_id', $user->id)
            ->where('date', '>=', $startOfMonth)
            ->where('date', '<=', $endOfMonth)
            ->get();

        // Meal Ticket
        $mealTicket = MealTicket::where('user_id', $user->id)
            ->where('date', '>=', $startOfMonth)
            ->where('date', '<=', $endOfMonth)
            ->first();

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

            $todaysSchedule = $operatorsSchedule
                ->where('date', '>=', $startOfDay)
                ->where('date', '<=', $endOfDay)
                ->first();

            //Operators Schedule
            $operatorData[] = [
                'day' => $i,
                'schedule' => $todaysSchedule ? $todaysSchedule->shift : null,
            ];
        }

        $days = collect($operatorData)->chunk(7);
        return [
            'days' => $days,
            'mealTickets' => $mealTicket,
        ];
    }
}
