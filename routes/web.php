<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Controller;
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

// don't use unless you want to rest storage
Route::group(['middleware' => ['auth']], function () {
    // Route::GET('/reset-file-system', [Controller::class,'deleteFilSystems']);
    Route::POST('/upload-dp', [UserProfileController::class,'uploadDp'])->name('admin.upload-dp');
    Route::GET('/read-message/{id}', [MessageController::class,'readMessage']);
});

