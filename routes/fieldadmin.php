<?php

use App\Http\Controllers\FieldAdmin\HomePageController;
use App\Http\Controllers\FieldAdmin\ProfileController;
use App\Http\Controllers\FieldAdmin\MessageController;
use App\Http\Controllers\FieldAdmin\ScheduleController;
use App\Http\Controllers\FieldAdmin\ScheduleFieldWorkerController;
use Illuminate\Support\Facades\Route;


Route::GET('/', [HomePageController::class,'index'])->name('field.admin.index');

Route::GET('/schedule/{month?}/{year?}', [ScheduleController::class,'schedule'])->name('field.admin.schedule');

Route::GET('/messages', [MessageController::class,'messages'])->name('field.admin.messages');

Route::GET('/profile', [ProfileController::class,'profile'])->name('field.admin.profile');

Route::POST('/profile-update', [ProfileController::class,'update'])->name('field.admin.profile.update');

Route::GET('/field-workers', [ScheduleFieldWorkerController::class,'allSchedules'])->name('field.admin.field-workers');

Route::GET('/field-worker-schedules/{user}/{month?}/{year?}', [ScheduleFieldWorkerController::class,'scheduleFieldWorker'])->name('field.admin.schedule.field.worker');

Route::POST('/field-worker-schedules-action', [ScheduleFieldWorkerController::class,'scheduleFieldWorkerAction'])->name('field.admin.schedule.field.worker.action');