<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        // staff strength

        //issued tickets

        //total ticket cost

        //day shift for operator

        //night shift for operator

        //off shifts for operator

        //work days for field work days

        //off days for field work days

        return view('admin.index');
    }
}
