@extends("layouts.app")

@section("content_body")
<div class="card card-warning">
    <div class="card-header">@lang("Instructor Details")</div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                   <tr>
                    <th>@lang("Full Name")</th>
                    <th>@lang("Email")</th>
                    <th>@lang("Phone Number")</th>

                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$admin->full_name}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->phone_number}}</td>

                    </tr>
                </tbody>
            </table>

    </div>
    </div>

</div>
@stop
