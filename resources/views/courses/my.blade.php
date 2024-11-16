@extends("layouts.app")

@section("content")
    <div class="card card-warning">
        <div class="card-header">
            @lang("My Courses")
        </div>
        <div class="card-body" >
            @foreach ($courses->items() as $course)
                <h3 class="h3">{{app()->getLocale() =="en" ? $course->title_en: $course->title_ar }}</h3>
                <iframe id="existing-iframe-example" data-course="{{$course->id}}" data-admin="{{$admin->id}}" width="560" height="315" src="{{$course->video_link}}&enablejsapi=1&t={{$time}}s" title="YouTube video player"
                        frameborder="0"
                        enablejsapi="true"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            @endforeach

            {{$courses->links()}}
        </div>
    </div>

@endsection

@push("js")

<script type="text/javascript">
  


  var tag = document.createElement('script');
  tag.id = 'iframe-demo';
  tag.src = 'https://www.youtube.com/iframe_api';
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;

  function onYouTubeIframeAPIReady() {
    player = new YT.Player('existing-iframe-example', {
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
    });

  }


  

</script>
@endpush