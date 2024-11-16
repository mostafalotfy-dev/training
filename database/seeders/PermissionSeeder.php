<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Admin::truncate();
       $admin =  Admin::create([
            "full_name"=>"mostafa",
            "email"=>"m@il.com",
            "phone_number"=>"01111111111",
            "password"=> bcrypt("Dr@g0nB@11Z"),
        ]);
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Permission::truncate();
        $admin_role = Role::create(["name"=>"admin","guard_name"=>"admin"]);
         Role::create(["name"=>"instructor","guard_name"=>"admin"]);
        Role::create(["name"=>"trainer","guard_name"=>"admin"]);
        $permissions = [
            "roles",
            "admins", // Instructor
            "setting",
            "instructor",
            "trainers",
            "courses"
        ];
        foreach( $permissions as $permission ) {
            foreach(["create","read","update","delete"] as $key)
            {
                $admin_role->givePermissionTo(Permission::create(["name"=>$key."-".$permission,"guard_name"=>"admin"]));
            }
        }
        $admin->assignRole($admin_role);

        Schema::enableForeignKeyConstraints();
    }
}
