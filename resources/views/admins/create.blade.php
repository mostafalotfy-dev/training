@extends("layouts.app")



@section("content_body")
<div class="card card-warning">
    <div class="card-header">
        @lang("Create Instructor")
    </div>
    <div class="card-body">
        {{html()->form("post",route("admins.store"))->open()}}
           @include("admins.form")
        {{html()->form()->close()}}
    </div>
</div>
@stop

@push("js")
    <script>
        $(".select2").select2()
    </script>
@endpush