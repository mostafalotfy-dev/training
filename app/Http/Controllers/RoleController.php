<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\Permission;
class RoleController extends Controller
{
    public function __construct(){
        $this->middleware("permission:create-roles")->only("create","store");
        $this->middleware("permission:update-roles")->only("edit","update");
        $this->middleware("permission:delete-roles")->only("destroy");
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view("roles.edit", compact("role","permissions"));
    }
    public function update( $id)
    {
        request()->validate([
            "name"=> ["required","max:255",Rule::unique("roles","name")->ignore(request("role"))],
        ]);
        $role = Role::findOrFail($id);
        $input = request()->only("name");
        $role->update($input);
        if(request("permissions"))
        {
            $permissions = Permission::find(request()->only("permissions"));
            
            $role->permissions()->sync($permissions); 
        }
        return back();
    }
    public function show($id)
    {
        $role = Role::findOrFail($id);
        if($role ->id == 1)
            abort(404);
        $permissions = $role->permissions()->pluck("name","id");
        return view("roles.show",compact("role","permissions"));
    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $permissions_count = $role->permissions()->count("id");
        if($permissions_count > 0)
        {
            toastr()->error(__("Remove the related Instructors First."));
            return back();
        }
       
        $role->delete();
        toastr()->success(__("Role Deleted Successfully"));
        return back();
    }
    public function store()
    {
        request()->validate([
            "name"=>["required","max:255",Rule::unique("roles","name")->ignore(request("role"))]
        ]);
        $role = Role::create(request()->only("name"));
        if(request("permissions"))
        {
            $permission_names = collect(Permission::find(request("permissions")));
            $permission_names->map(fn($permission)=>$role->givePermissionTo($permission));
        }
        toastr()->success(__("Role Added Successfully"));
        return back();

    }
    public function create()
    {
        $permissions = Permission::all();
       return view("roles.create", compact("permissions"));
    }
}
