<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarHelperController extends Controller
{
    public static function calendarGenerator(){
        $arrayYears = array(); // this is to get the last 10 years from the current year
        for($i = 0; $i <= 5; $i++){
            $year = now()->subYear($i)->year;
            array_push($arrayYears,$year);
        }
        $years = $arrayYears;

        $month = [
            ['month'=>'January','number'=>1],
            ['month'=>'February','number'=>2],
            ['month'=>'March','number'=>3],
            ['month'=>'April','number'=>4],
            ['month'=>'May','number'=>5],
            ['month'=>'June','number'=>6],
            ['month'=>'July','number'=>7],
            ['month'=>'August','number'=>8],
            ['month'=>'September','number'=>9],
            ['month'=>'October','number'=>10],
            ['month'=>'November','number'=>11],
            ['month'=>'December','number'=>12],
        ];
        return [$years , $month];
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

    
}
