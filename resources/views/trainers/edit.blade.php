@extends("layouts.app")

@section("content_body")
<div class="card card-warning">
    <div class="card-header">
        @lang("Edit Trainer")
    </div>
    <div class="card-body">
        {{html()->modelForm($trainer,"put",route("trainers.update",$trainer->id))->open()}}
            @include("trainers.form")
            {{html()->submit(__("Save"))->class("btn btn-primary mt-3")}}
        {{html()->form()->close()}}

    </div>
</div>
@endsection
