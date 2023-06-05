<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::GET('/home', [HomeController::class,'redirectPersonnel'])->name('home');


