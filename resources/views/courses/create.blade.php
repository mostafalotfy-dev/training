@extends("layouts.app")


@section("content_body")
    <div class="card card-warning">
        <div class="card-header">
            @lang("Create Course")
        </div>
        <div class="card-body">
         
            {{html()->form("post",route("courses.store"))->id("select")->open()}}
                @include("courses.form")
                <hr>
                {{html()->submit(__("Save"))->class("btn btn-primary")}}
            {{html()->form()->close()}}
        </div>
    </div>
@stop
