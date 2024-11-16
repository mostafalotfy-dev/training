<?php

namespace App\Http\Controllers;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Admin;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware("permission:create-courses")->only("create","store");
        $this->middleware("permission:update-courses")->only("edit","update");
        $this->middleware("permission:delete-courses")->only("destroy");
    }
  public function ajax()
  {
    $instructors = Admin::role("instructor")->paginate()
    ->map(fn($data)=>[
        "id"=>$data->id,
        "text"=>$data->full_name,
    ]);
    return response()->json(["results"=>$instructors]);


  }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("courses.create");
    }
    public function my()
    {
       
        if(request()->ajax())
        {
            request()->validate([
                "course_id"=>"required|exists:courses,id|integer",
                "time"=>"required",
                "admin_id"=>"required|exists:admins,id|integer"
            ]);
            $db = \DB::table("courses_watched");
           
            $course_exists = $db->where("course_id",request("course_id"))
            ->where("admin_id",request("admin_id"))->where("finished",0)->count() > 0;
            
            match($course_exists){
                false => $db->insert(  [
                    "course_id"=>request("course_id"),
                    "time"=> request("time"),
                    "admin_id"=>request("admin_id"),
                    "finished"=>request("finished"),
                ]),
                true => $db->update(  [
                    "course_id"=>request("course_id"),
                    "time"=> request("time"),
                    "admin_id"=>request("admin_id"),
                    "finished"=>request("finished")
                ]),
            };
          
        
            return response("",204);
        }
        $admin = auth("admin")->user();
        $courses = $admin->courses()->paginate(1);
        $time = \DB::table("courses_watched")
        ->latest("time")
        ->where("admin_id",$admin->id)
        ->latest("id")->value("time");
        return view("courses.my",compact("admin","courses","time"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title_en"=>"required|max:255|string",
            "title_ar"=>"required|max:255|string",
            "video_link"=>"required|max:255|string",
            "admin_id"=>"required",
            "description_en"=>"nullable|string",
            "description_ar"=>"nullable|string",
        ]);
        $input = request()->only("title_en","title_ar","description_en","description_ar","video_link","admin_id");
        Course::create($input);
        toastr()->success(__("Course Created Successfully"));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $key = Youtube::parseVidFromURL($course->video_link);
        return view("courses.show",compact("course","key"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $instructors = $course->instructors()->pluck("full_name","id");
        return view("courses.edit",compact("course","instructors"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Course $course)
    {
        request()->validate([
            "title_en"=>"required|max:255|string",
            "title_ar"=>"required|max:255|string",
            "video_link"=>"required|max:255|string",
            "admin_id"=>"required",
            "description_en"=>"nullable|string",
            "description_ar"=>"nullable|string",
        ]);
        $input = request()->only("title_en","title_ar","video_link","admin_id","description_en","description_ar");
        $course->update($input);
        toastr()->success(__("Course Updated Succefully"));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }
}
