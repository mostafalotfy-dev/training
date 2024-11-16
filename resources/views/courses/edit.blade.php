@extends("layouts.app")

@section("content_body")
<div class="card card-warning">
    <div class="card-header">
        @lang("Edit Course")
    </div>
    <div class="card-body">
        {{html()->modelForm($course,"put",route("courses.update",$course->id))->open()}}
            @include("courses.form")
            {{html()->submit(__("Save"))->class("btn btn-primary mt-3")}}
        {{html()->form()->close()}}

    </div>
</div>
@endsection
