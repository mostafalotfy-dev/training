
<div class="row">
    <div class="col-md-3">
        <label for="full_name">@lang("Name")</label>
        {{html()->text("full_name")->class("form-control")->required()}}
        @error("full_name")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="email">@lang("Email")</label>
        {{html()->email("email")->class("form-control")->required()}}
        @error("Email")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="phone_number">@lang("Phone Number")</label>
        {{html()->text("phone_number")->class("form-control")->required()}}
        @error("phone_number")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-3 wrap">
       
       <label for="password">@lang("Password")</label>
       {{html()->password("password")->class("form-control")->placeholder(__("Password"))->required()}}

       @error("password")
       <div class="text-danger">{{$message}}</div>
       @enderror
 
    </div>
    <div class="col-md-3">
        <label for="admin_id">@lang("Choose Instructor")</label>
        {{html()->select("admin_id")->class("form-control select2")->required()}}
        @error("admin_id")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

</div>

@push("js")
    <script>
        $("[name=admin_id]").select2({
            ajax:{
                url:"{{route("ajax.trainer")}}",
                method:"post",
                processResults:function(data){

                    return {
                        results:data.items
                    }
                }
            }
        }
        )
    </script>
@endpush
