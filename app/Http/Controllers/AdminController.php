<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view("admins.show", compact("admin"));
    }
   public function create()
   {
    $roles = Role::all()->pluck("name","id");
    return view("admins.create",compact("roles"));
   }
   public function store()
   {
    $this->validate(request(), [
        "full_name"=> "required|max:255",
        "email"=> ["required","email", Rule::unique("admins","email")->ignore(request("admin"))],
        "password"=> ["required","max:255","min:8"],
        "phone_number"=>["required","max:255",Rule::unique("admins","phone_number")->ignore(request("admin"))],

    ]);
    $input = request()->only("full_name","email","phone_number");

    $input["password"] = bcrypt(request("password"));


     $admin = Admin::create($input);
     $admin->assignRole(Role::where("name","instructor")->first());
    toastr()->success(__("Instructor Created Succefully"));
    return back();
   }
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all()->pluck("name","id");
        return view("admins.edit",compact("roles","admin"));
    }
    public function update($id)
    {
        $this->validate(request(), [
            "full_name"=> "required|max:255",
            "email"=> ["required","email", Rule::unique("admins","email")->ignore(request("admin"))],
            "password"=> ["nullable","max:255","min:8"],
            "phone_number"=>["required","max:255",Rule::unique("admins","phone_number")->ignore(request("admin"))],

        ]);
        $input = request()->only("full_name","email","phone_number");
        if(request("password"))
        {
            $input["password"] = bcrypt(request("password"));
        }
        $admin = Admin::find($id);
        $admin->update($input);
        $role = Role::where("name","instructor")->first();

        $admin->roles()->sync($role);
        toastr()->success("Instructor Updated Succesfully");
        return back();
    }
    public function destroy($id)
    {
        $admin = Admin::find($id);

        $admin->delete();
        toastr()->success(__("Instructor Deleted Successfully"));
        return back();
    }
}
