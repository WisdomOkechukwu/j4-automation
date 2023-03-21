<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarHelperController extends Controller
{
    private $month;
    private $year;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
    }
    public function dumpLoader(){
        // if(count($request->all()) > 0){
        //     self::handleCalendarRequest($request);
        // }
        $month = $this->month;
        $year = $this->year;
        $firstDayOfTheMonth = "$year-$month-01";

        $daysOfTheWeek = date('w', strtotime($firstDayOfTheMonth));
        $days = array();

        for ($i=1; $i < $daysOfTheWeek ; $i++) { 
            $days [] = NULL;
        }

        $numberOfDays = date('t', strtotime($firstDayOfTheMonth));
        for($i = 1; $i <= $numberOfDays ; $i++) {
            $days[] = $i;
        }

        $days = collect($days)->chunk(7);
        // dd($days);

        return view('aatester.test',compact(['days', 'month']));
    }

    public function handleCalendarRequest($request){
        $monthQuery = $request->all();
        dd($monthQuery);

        foreach ($monthQuery as $key => $mq) {
            // dd($mq, $key);
            $day = Carbon::parse("2023-".$key);
            dd($day->format('Y M d'), $mq);
        }
    }

    public function loadWorkersCalendar(){

    }

    public function loadFieldWorkerAdminCalendar(){

    }

    public function loadFieldOperatorCalendar(){

    }

    public function saveFieldWorkerAdminCalendar(array $calendarArray){

    }

    public function saveFieldOperatorCalendar(array $calendarArray){

    }

    
}
