<?php

use App\Http\Controllers\FieldWorker\HomePageController;
use Illuminate\Support\Facades\Route;


Route::GET('/', [HomePageController::class,'index'])->name('field.worker.index');