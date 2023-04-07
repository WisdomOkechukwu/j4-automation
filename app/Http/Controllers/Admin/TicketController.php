<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\CalendarHelperController;
use App\Models\MealTicket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function assignTicket()
    {
        $calendar = CalendarHelperController::calendarGenerator();
        $months = $calendar[1];

        $users = User::with('role')
            ->where('role_id', '889')
            ->get();
        return view('admin.assign_tickets', compact(['users', 'months']));
    }

    public function singleAssignTicket(Request $request)
    {
        $user = json_decode($request->user_id);

        $date = Carbon::parse(now()->year . '-' . $request->single_assign_month . '-1');
        $mealTicket = MealTicket::where('user_id', $user->id)
            ->whereDate('date', $date)
            ->first();

        if ($mealTicket) {
            $mealTicket->update([
                'number' => $request->single_ticket_no,
                'amount' => $request->single_amount,
            ]);
        } else {
            $mealTicket = new MealTicket();
            $mealTicket->number = $request->single_ticket_no;
            $mealTicket->amount = $request->single_amount;
            $mealTicket->date = Carbon::parse($date);
            $mealTicket->user_id = $user->id;
            $mealTicket->save();
        }
        $fullName = $user->first_name." ".$user->last_name;

        return back()->with('success', "$fullName Ticket Added Successful");
    }

    public function multipleAssignTicket(Request $request)
    {
        $date = Carbon::parse(now()->year . '-' . $request->bulk_month . '-1');

        $selectedUsers = $request->except('_token', 'bulk_month', 'bulk_ticket_no', 'bulk_amount');
        foreach ($selectedUsers as $id => $user) {
            if ($user == 'on') {
                $mealTicket = MealTicket::where('user_id', $id)
                    ->whereDate('date', $date)
                    ->first();

                if ($mealTicket) {
                    $mealTicket->update([
                        'number' => $request->bulk_ticket_no,
                        'amount' => $request->bulk_amount,
                    ]);
                } else {
                    $mealTicket = new MealTicket();
                    $mealTicket->number = $request->bulk_ticket_no;
                    $mealTicket->amount = $request->bulk_amount;
                    $mealTicket->date = Carbon::parse($date);
                    $mealTicket->user_id = $id;
                    $mealTicket->save();
                }
            }
        }

        return back()->with('success', 'Bulk Assign Successful');
    }
}
