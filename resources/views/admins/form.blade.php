
<div class="row">
    <div class="col-md-3">
        <label for="full_name">@lang("Full Name")</label>
        {{html()->text("full_name")->class("form-control")->required()}}
        @error("full_name")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="email">@lang("email")</label>
        {{html()->email("email")->class("form-control")->required()}}
        @error("email")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-3">
        <label for="phone_number">@lang("phone_number")</label>
        {{html()->text("phone_number")->class("form-control")->required()}}
        @error("phone_number")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="col-md-3">

        <label for="password">@lang("Password")</label>
        @isset($admin)
        {{html()->password("password")->class("form-control")}}
        @else
        {{html()->password("password")->class("form-control")->required()}}
        @endisset

        @error("password")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>

</div>
<hr>
{{html()->submit(__("Save"))->class("btn btn-primary mt-2")}}
