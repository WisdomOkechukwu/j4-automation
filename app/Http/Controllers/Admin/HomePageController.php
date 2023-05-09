<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FieldWorkerSchedule;
use App\Models\MealTicket;
use App\Models\OperatorSchedule;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public static function index()
    {
        try {
            $startOfMonth = now()->startOfMonth();
            $endOfMonth = now()->endOfMonth();

            // staff strength
            $staffStrength = number_format(User::count());

            //issued tickets
            $issuedTickets = MealTicket::where('date', '>=', $startOfMonth)
                ->where('date', '<=', $endOfMonth)
                ->get();

            $issuedTicketsNo = number_format($issuedTickets->sum('number'));

            //total ticket cost
            $issuedTicketsCost = number_format($issuedTickets->sum('amount'));

            //day shift for operator
            $operatorSchedule = OperatorSchedule::where('date', '>=', $startOfMonth)
                ->where('date', '<=', $endOfMonth)
                ->get();

            $dayShift = number_format($operatorSchedule->where('shift', 'day')->count());

            //night shift for operator
            $nightShift = number_format($operatorSchedule->where('shift', 'night')->count());

            //off shifts for operator
            $offShift = number_format($operatorSchedule->whereIn('shift', ['off', null])->count());

            //work days for field work days
            $fieldWorkerSchedule = FieldWorkerSchedule::where('date', '>=', $startOfMonth)
                ->where('date', '<=', $endOfMonth)
                ->get();

            $workDays = number_format($fieldWorkerSchedule->where('shift', 'wd')->count());

            //off days for field work days
            $offDays = number_format($fieldWorkerSchedule->where('shift', 'od')->count());
            return view('admin.index', compact(['staffStrength', 'issuedTicketsNo', 'issuedTicketsCost', 'dayShift', 'nightShift', 'offShift', 'workDays', 'offDays']));
        } catch (\Exception $exception) {
            logger($exception->getMessage());
        }
    }
}
