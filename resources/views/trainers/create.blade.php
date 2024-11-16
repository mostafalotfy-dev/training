@extends("layouts.app")


@section("content_body")
    <div class="card card-warning">
        <div class="card-header">
            @lang("Create Trainer")
        </div>
        <div class="card-body">
         
            {{html()->form("post",route("trainers.store"))->id("select")->open()}}
                @include("trainers.form")
                <hr>
                {{html()->submit(__("Save"))->class("btn btn-primary")}}
            {{html()->form()->close()}}
        </div>
    </div>
@stop
