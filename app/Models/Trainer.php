<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class Trainer extends Authenticatable
{
    use HasRoles;
    protected $fillable = ["name","email","phone_number","admin_id"];
    public $timestamps = false;
}
