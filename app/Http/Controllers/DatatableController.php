<?php

namespace App\Http\Controllers;
use App\DataTables\CourseDataTable;
use App\DataTables\AdminDataTable;
use App\DataTables\RoleDataTable;
use App\DataTables\TrainerDataTable;
use RealRashid\SweetAlert\Facades\Alert;
class DatatableController extends Controller
{
    public function index()
    {
        $dt = collect([
             "admins.index"=> fn() => (new AdminDataTable())->render("admins.index"),
             "roles.index" => fn() => (new RoleDataTable())->render("roles.index"),
             "trainers.index"=>fn() => (new TrainerDataTable())->render("trainers.index"),
             "courses.index"=>fn() => (new CourseDataTable())->render("courses.index"),
           
        ]);
     
        return $dt[request()->route()->getName()]();
    }
}
