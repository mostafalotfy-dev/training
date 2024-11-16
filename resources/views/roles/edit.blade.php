@extends("layouts.app")

@section("content_body")
<div class="card card-warning">
    <div class="card-header">
        @lang("Edit Role")
    </div>
    <div class="card-body">
        {{html()->modelForm($role,"put",route("roles.update",$role->id))->open()}}
            @include("roles.form")
            {{html()->submit(__("Save"))->class("btn btn-primary mt-3")}}
        {{html()->form()->close()}}

    </div>
</div>
@endsection
