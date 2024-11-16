<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public $fillable = [
   "title_en",
   "title_ar",
   "description_en",
   "description_ar",
   "video_link",
   "admin_id"
  ];
  public function instructors(){
    return $this->belongsTo(Admin::class);
  }
}
