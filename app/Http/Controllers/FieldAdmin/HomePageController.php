<?php

namespace App\Http\Controllers\FieldAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FieldWorker\HomePageController as FieldWorkerHomePageController;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        return (new FieldWorkerHomePageController())->index();
    }
}
