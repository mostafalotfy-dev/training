<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainerController;
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

Auth::routes();

Route::group(['prefix'=> "admin"],function(){
    
    Route::get("admins",[DatatableController::class,"index"])->name("admins.index")->middleware("permission:read-admins");
    Route::get("roles",[DatatableController::class,"index"])->name("roles.index")->middleware("permission:read-roles");
    Route::get("trainers",[DatatableController::class,"index"])->name("trainers.index")->middleware("permission:read-trainers");
    Route::resource("roles",RoleController::class)->except("index");
    Route::resource("admins",AdminController::class)->except("index");
    Route::resource("trainers",TrainerController::class)->except("index")->middleware("permission:read-trainers");
    Route::get("courses",[DatatableController::class,"index"])->name("courses.index")->middleware("permission:read-courses");
    Route::resource("courses",CourseController::class)->except("index");
    Route::get("dashboard",DashboardController::class)->name("dashboard");
    Route::get("reports",DashboardController::class)->name("dashboard");
    Route::get("my-courses",[CourseController::class,"my"])->name("courses.my");

});
    

})->middleware(["auth:admin"]);
