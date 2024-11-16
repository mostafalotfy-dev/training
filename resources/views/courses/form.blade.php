<div class="row repeat">
    <div class="col-md-6">
   
            <label for="title_en">@lang("Title In English")</label>
            {{html()->text("title_en")->class("form-control")->placeholder(__("Course Title in English"))->required()}}

            @error("title_en")
            <div class="text-danger">{{$message}}</div>
            @enderror
    
    </div>

    <div class="col-md-6">
   
            <label for="title_ar">@lang("Title In Arabic")</label>
            {{html()->text("title_ar")->class("form-control")->placeholder(__("Course Title in Arabic"))->required()}}

            @error("title_ar")
            <div class="text-danger">{{$message}}</div>
            @enderror
       
    </div>

    <div class="col-md-6 wrap">
       
            <label for="video_link">@lang("Youtube Link") <i class="fas fa-heart"></i></label>
            {{html()->text("video_link")->class("form-control")->placeholder(__("Add Video"))->required()}}

            @error("video_link")
            <div class="text-danger">{{$message}}</div>
            @enderror
      
    </div>
   
    <div class="col-md-6">
   
            <label for="description_en">@lang("Description in English")</label>
            {{html()->textarea("description_en")->class("form-control")->placeholder(__("Course Title in English"))}}

            @error("description_en")
            <div class="text-danger">{{$message}}</div>
            @enderror
       
    </div>
        <div class="col-md-6">
        @can("read-admins")
            <label for="admin_id">@lang("Instructor")</label>
            {{html()->select("admin_id")
            ->class("form-control select2")
            ->placeholder(__("Select Instructor"))}}

            @error("admin_id")
            <div class="text-danger">{{$message}}</div>
            @enderror
    @endcan
    </div>
    <div class="col-md-6">
   
   <label for="description_ar">@lang("Description in Arabic")</label>
   {{html()->textarea("description_ar")->class("form-control")->placeholder(__("Course Title in Arabic"))}}
   @error("description_ar")
   <div class="text-danger">{{$message}}</div>
   @enderror

</div>

</div>


@push("js")
    <script>
     
        $(".select2").select2({
            ajax:{
              url:"{{route("ajax.instructor")}}",
                method:"post"
            }
        })
    </script>
@endpush
