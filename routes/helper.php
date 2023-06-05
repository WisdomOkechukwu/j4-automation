<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;


Route::GET('/reset-file-system', [Controller::class,'deleteFilSystems']);

Route::POST('/admin/upload-dp', [UserProfileController::class,'uploadDp'])->name('admin.upload-dp');

Route::GET('/admin/read-message/{id}', [MessageController::class,'readMessage']);

Route::POST('/logout', [LogoutController::class,'logout'])->name('logout');

