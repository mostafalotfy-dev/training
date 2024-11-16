@extends("layouts.app")

@section("content_body")
<div class="card card-warning ">
    <div class="card-header">
        @lang("Courses")
    </div>

    <div class="card-body">
        @can("read-courses")
        <a class="btn btn-primary" href="{{route("courses.create")}}">@lang("Create Course")</a>
        @endcan
        
    <hr>
    <div class="table-responsive">      
          {{$dataTable->table()}}
        </div>
    </div>
</div>
@stop
@push('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    
@endpush