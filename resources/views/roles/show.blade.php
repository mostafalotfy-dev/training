@extends("layouts.app")


@section("content_body")
    <div class="card card-warning">
        <div class="card-header">
            @lang("Show Role") 
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                    <th>@lang("Role Name")</th>
                        <th>@lang("Name")</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>{{$permission}}</td>
                       
                    </tr>    
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

@stop