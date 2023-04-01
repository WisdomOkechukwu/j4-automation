<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldAdminController;
use App\Http\Controllers\FieldWorkerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'marketing'] ], function () {

Route::group(['prefix' => 'field'], function () {

    Route::group(['prefix' => 'worker'], function () {
        Route::GET('/', [FieldWorkerController::class,'index'])->name('field.workers.index');
        Route::GET('/schedule', [FieldWorkerController::class,'schedule'])->name('field.workers.schedule');
        Route::GET('/messages', [FieldWorkerController::class,'messages'])->name('field.workers.messages');
        Route::GET('/profile', [FieldWorkerController::class,'profile'])->name('field.workers.profile');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::GET('/', [FieldAdminController::class,'index'])->name('field.admin.index');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::GET('/', [AdminController::class,'index'])->name('admin.index');
    Route::GET('/user-schedules', [AdminController::class,'allSchedules'])->name('admin.user.schedules');
    Route::GET('/operator-schedules', [AdminController::class,'scheduleOperator'])->name('admin.user.schedule.operator');
    Route::GET('/field-worker-schedules', [AdminController::class,'scheduleFieldWorker'])->name('admin.user.schedule.field.worker');
    Route::GET('/operator-overview', [AdminController::class,'operatorOverview'])->name('admin.user.operator.overview');
    Route::GET('/field-worker-overview', [AdminController::class,'fieldWorkerOverview'])->name('admin.user.field.worker.overview');
    Route::GET('/users', [AdminController::class,'allUsers'])->name('admin.users');
    Route::GET('/user-profile', [AdminController::class,'userProfile'])->name('admin.user-profile');
    Route::GET('/user-message', [AdminController::class,'userMessage'])->name('admin.user-message');
    Route::GET('/assign-tickets', [AdminController::class,'assignTicket'])->name('admin.assign.tickets');
    Route::GET('/leave-tracker', [AdminController::class,'leaveTracker'])->name('admin.leave.tracker');
});
