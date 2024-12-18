<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Trainer;
class DashboardController extends Controller
{
    
    public function __invoke()
    {
        $admins = Admin::count(); // Insturctors
        $courses = Course::count();
        $trainers = Admin::role("trainer")->count();
        $courses_watched_sum = table("courses_watched")->sum("time") /60/60;
        return view("dashboard",compact("admins","courses","trainers","courses_watched_sum"));
    }
}
