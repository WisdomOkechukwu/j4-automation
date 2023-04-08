<?php

use App\Http\Controllers\Admin\FieldWorkersTrackingsOverviewController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\LeaveTrackerController;
use App\Http\Controllers\Admin\OperatorsScheduleOverviewController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\ScheduleFieldController;
use App\Http\Controllers\Admin\ScheduleOperatorController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::GET('/', [HomePageController::class,'index'])->name('admin.index');

Route::GET('/user-schedules', [ScheduleController::class,'allSchedules'])->name('admin.user.schedules');

Route::GET('/operator-schedules/{user}/{month?}/{year?}', [ScheduleOperatorController::class,'scheduleOperator'])->name('admin.user.schedule.operator');

Route::POST('/operator-schedules-action', [ScheduleOperatorController::class,'scheduleOperatorAction'])->name('admin.user.schedule.operator.action');

Route::GET('/field-worker-schedules/{user}/{month?}/{year?}', [ScheduleFieldController::class,'scheduleFieldWorker'])->name('admin.user.schedule.field.worker');

Route::POST('/field-worker-schedules-action', [ScheduleFieldController::class,'scheduleFieldWorkerAction'])->name('admin.user.schedule.field.worker.action');

Route::GET('/operator-overview', [OperatorsScheduleOverviewController::class,'operatorOverview'])->name('admin.user.operator.overview');

Route::GET('/field-worker-overview', [FieldWorkersTrackingsOverviewController::class,'fieldWorkerOverview'])->name('admin.user.field.worker.overview');

Route::GET('/users', [UsersController::class,'allUsers'])->name('admin.users');

Route::GET('/user-profile', [UserProfileController::class,'userProfile'])->name('admin.user-profile');

Route::GET('/user-message', [UsersController::class,'userMessage'])->name('admin.user-message');

Route::GET('/assign-tickets', [TicketController::class,'assignTicket'])->name('admin.assign.tickets');

Route::POST('/single-assign-tickets', [TicketController::class,'singleAssignTicket'])->name('admin.assign.single.tickets');

Route::POST('/multiple-assign-tickets', [TicketController::class,'multipleAssignTicket'])->name('admin.assign.multiple.tickets');

Route::GET('/leave-tracker', [LeaveTrackerController::class,'leaveTracker'])->name('admin.leave.tracker');
