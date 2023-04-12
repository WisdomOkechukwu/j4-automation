<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\MealTicket;
use App\Models\OperatorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
        //schedule for the week
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $operatorSchedule = OperatorSchedule::where('user_id', Auth::user()->id)
            ->where('date', '>=', $startOfWeek)
            ->where('date', '<=', $endOfWeek)
            ->get();


        //Meal TIcket Information
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $mealTicket = MealTicket::where('user_id', Auth::user()->id)
        ->where('date', '>=', $startOfMonth)
        ->where('date', '<=', $endOfMonth)
        ->first();
        
        dd($mealTicket);

        //Leave Tracker 
        //still pending

        // return 

    }
}
