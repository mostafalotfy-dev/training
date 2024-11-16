@extends("layouts.app")

@section("content")
    <div class="card card-warning">
        <div class="card-header">
            @lang("My Courses")
        </div>
        <div class="card-body" >
            @foreach ($courses->items() as $course)
                <h3 class="h3">{{app()->getLocale() =="en" ? $course->title_en: $course->title_ar }}</h3>
                <iframe id="video" width="560" height="315" src="{{$course->video_link}}?enablejsapi=1" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            @endforeach

            {{$courses->links()}}
        </div>
    </div>

@endsection

@push("js")
    <script>
       var tag = document.createElement('script');
  tag.id = 'iframe-demo';
  tag.src = 'https://www.youtube.com/iframe_api';
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        events: {
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
    });
  }
  function onPlayerReady(event) {
   console.log("Ready")
  }

  function onPlayerStateChange(event) {
    
    if (event.data == 1) {

   
  console.log("Ok")
}
  }
    </script>
@endpush