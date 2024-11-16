@extends("layouts.app")


@section("content_body")
    <div class="card card-warning">
        <div class="card-header">
            @lang("Show Role") 
        </div>
        <div class="card-body">
            <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    
                    <tr>
                        <th>@lang("Title in English")</th>
                        <th>@lang("Title in Arabic")</th>
                        <th>@lang("Description in Arabic")</th>
                        <th>@lang("Description in English")</th>
                        <th>@lang("Youtube Link")</th>

                    </tr>
                    
                </thead>
                <tbody>
                    <tr>
                        <td>{{$course->title_en}}</td>
                        <td>{{$course->title_ar}}</td>
                        <td>{{$course->description_en}}</td>
                        <td>{{$course->description_ar}}</td>
                        <td><iframe src="{{str($course->video_link)->replace("watch","embed"."/".$key)}}" frameborder="0"></iframe></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        </div>
    </div>

@stop