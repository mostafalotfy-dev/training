@extends("layouts.app")
@section("content_body")
<div class="card card-warning">
    <div class="card-header">
        @lang("Update Instructor")
    </div>
    <div class="card-body">
        {{html()->modelForm($admin,"put",route("admins.update",$admin->id))->open()}}
           @include("admins.form")
        {{html()->form()->close()}}
    </div>
</div>
@stop