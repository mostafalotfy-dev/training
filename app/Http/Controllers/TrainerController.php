<?php

namespace App\Http\Controllers;

use App\Models\Admin;


class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:create-trainers")->only("create","store");
    }
    public function create()
    {
        return view("trainers.create");
    }

    public function ajax()
    {
        $trainer = Admin::where("id", "<>",1)->paginate()
        ->map(function($data){
            return [
                "id"=> $data->id,
                "text"=> $data->full_name,
                "selected"=>request("q") == $data->id
            ];
        });
        return response()->json(["items"=>$trainer]);
    }
    public function store()
    {
        request()->validate([
            "full_name"=> "required|max:255|string",
            "email"=> ["required","email","max:255","unique:admins,email"],
            "phone_number"=>["required","max:255"],
            "admin_id"=>["required","exists:admins,id"],


        ]);
        $input = request()->only("full_name","email","admin_id","password","phone_number","admin_id");
    if(\request("password"))
    {
        $input["password"] = bcrypt(\request("password"));
    }
        $admin =  Admin::create($input);
        $admin->assignRole("trainer");
        toastr()->success(__("Record added Successfully"));
        return back();
    }
}
