<?php

use App\Http\Controllers\Operator\HomePageController;
use App\Http\Controllers\Operator\MessagesController;
use App\Http\Controllers\Operator\ProfileController;
use App\Http\Controllers\Operator\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::GET('/', [HomePageController::class,'index'])->name('operator.index');

Route::GET('/schedule/{month?}/{year?}', [ScheduleController::class,'schedule'])->name('operator.schedule');

Route::GET('/profile', [ProfileController::class,'profile'])->name('operator.profile');

Route::POST('/profile-update', [ProfileController::class,'update'])->name('operator.profile.update');

Route::GET('/messages', [MessagesController::class,'messages'])->name('operator.profile.messages');