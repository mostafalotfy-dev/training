@extends("layouts.app")

@section("content_body")
<div class="card card-warning ">
    <div class="card-header">
        @lang("Trainers")
    </div>

    <div class="card-body">
        @can("read-trainers")
        <a class="btn btn-primary" href="{{route("trainers.create")}}">@lang("Create Trainer")</a>
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