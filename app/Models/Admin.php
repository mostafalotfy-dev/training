<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Admin extends Authenticatable
{
    use HasRoles;
    protected $fillable = [
        "full_name",
        "email",
        "password",
        "phone_number",
        "created_by"
    ];
}
