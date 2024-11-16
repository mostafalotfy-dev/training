@extends("layouts.app")

@section("content_body")
<div class="card card-warning">
    <div class="card-header">
        @lang("Instructors")
    </div>
    <div class="card-body">
        <a href="{{route("admins.create")}}" class="btn btn-primary">@lang("Create")</a>
        <hr>
        <div class="table-responsive">
    {{$dataTable->table()}}
    </div>
    </div>
    </div>
@stop
@push("js")
    {{$dataTable->scripts()}}
@endpush
