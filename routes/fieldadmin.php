<?php

use App\Http\Controllers\FieldAdmin\HomePageController;
use Illuminate\Support\Facades\Route;


Route::GET('/', [HomePageController::class,'index'])->name('field.admin.index');