<?php

use App\Http\Controllers\Operator\HomePageController;
use Illuminate\Support\Facades\Route;


Route::GET('/', [HomePageController::class,'index'])->name('operator.index');