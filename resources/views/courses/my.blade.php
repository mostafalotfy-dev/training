@extends("layouts.app")

@section("content")
    <div class="card card-warning">
        <div class="card-header">
            @lang("My Courses")
        </div>
        <div class="card-body">
            @foreach ($courses->items() as $course)

                <iframe width="560" height="315" src="{{$course->video_link}}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            @endforeach

            {{$courses->links()}}
        </div>
    </div>

@endsection
