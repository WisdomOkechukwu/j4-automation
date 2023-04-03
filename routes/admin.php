<?php

use App\Http\Controllers\Admin\FieldWorkersTrackingsOverviewController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\LeaveTrackerController;
use App\Http\Controllers\Admin\OperatorsScheduleOverviewController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::GET('/', [HomePageController::class,'index'])->name('admin.index');

Route::GET('/user-schedules', [ScheduleController::class,'allSchedules'])->name('admin.user.schedules');

Route::GET('/operator-schedules', [ScheduleController::class,'scheduleOperator'])->name('admin.user.schedule.operator');

Route::GET('/field-worker-schedules', [ScheduleController::class,'scheduleFieldWorker'])->name('admin.user.schedule.field.worker');

Route::GET('/operator-overview', [OperatorsScheduleOverviewController::class,'operatorOverview'])->name('admin.user.operator.overview');

Route::GET('/field-worker-overview', [FieldWorkersTrackingsOverviewController::class,'fieldWorkerOverview'])->name('admin.user.field.worker.overview');

Route::GET('/users', [UsersController::class,'allUsers'])->name('admin.users');

Route::GET('/user-profile', [UsersController::class,'userProfile'])->name('admin.user-profile');

Route::GET('/user-message', [UsersController::class,'userMessage'])->name('admin.user-message');

Route::GET('/assign-tickets', [TicketController::class,'assignTicket'])->name('admin.assign.tickets');

Route::GET('/leave-tracker', [LeaveTrackerController::class,'leaveTracker'])->name('admin.leave.tracker');
