<?php

use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;

Route::post('trainer', [TrainerController::class,"ajax"])->name("ajax.trainer");
Route::post("courses/ajax",[CourseController::class,"ajax"])->name("courses.ajax");
Route::post("instructor/ajax",[CourseController::class,"ajax"])->name("ajax.instructor");
