<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FieldWorkerController extends Controller
{
    public function index(){
        return view('field_worker.home');
    }

    public function schedule(){
        return view('field_worker.schedule');
    }

    public function messages(){
        return view('field_worker.message');
    }

    public function profile(){
        return view('field_worker.profile');
    }
}
