@extends("layouts.app")

@section("content_body")
<div class="card card-warning ">
    <div class="card-header">
        @lang("Roles")
    </div>
    <div class="card-body">
        @can("create-roles")
    <a href="{{route("roles.create")}}" class="btn btn-primary  mb-3">@lang("create new role")</a>
    <hr>
    @endcan 
    <div class="table-responsive">        {{$dataTable->table()}}</div>

    </div>
</div>
@stop
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    
@endpush