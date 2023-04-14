<?php

use App\Http\Controllers\FieldWorker\HomePageController;
use App\Http\Controllers\FieldWorker\ProfileController;
use App\Http\Controllers\FieldWorker\MessageController;
use App\Http\Controllers\FieldWorker\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::GET('/', [HomePageController::class,'index'])->name('field.worker.index');

Route::GET('/schedule/{month?}/{year?}', [ScheduleController::class,'schedule'])->name('field.worker.schedule');

Route::GET('/messages', [MessageController::class,'messages'])->name('field.worker.messages');

Route::GET('/profile', [ProfileController::class,'profile'])->name('field.worker.profile');

Route::POST('/profile-update', [ProfileController::class,'update'])->name('field.worker.profile.update');