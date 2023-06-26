<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
    return redirect('https://portal.j4automation.org/login');
    
});

Route::match(['GET', 'POST'], '/login', [LoginController::class, 'login'])->name('login');


Route::GET('/forgot', [ForgotPasswordController::class,'index'])->name('forgot');

Route::GET('/search/{id}', [ForgotPasswordController::class,'search']);

Route::POST('/sendToken', [ForgotPasswordController::class,'sendToken'])->name('forgot.token');

Route::GET('/reset/{token}', [ForgotPasswordController::class,'resetPage']);

Route::POST('/reset-password', [ForgotPasswordController::class,'resetPassword'])->name('forgot.reset');

