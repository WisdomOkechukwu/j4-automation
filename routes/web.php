<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldAdminController;
use App\Http\Controllers\FieldWorkerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
    return redirect()->route('login');
});

Route::match(['GET', 'POST'], '/login', [LoginController::class, 'login'])->name('login');

Route::GET('/home', [HomeController::class,'redirectPersonnel'])->name('home');

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

