@extends("layouts.app")



@section("content")
<div class="row">
    <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
        <div class="inner">
            <h3>{{$admins}}</h3>
            <p>@lang("Instructors")</p>
        </div>
        <div class="icon"><i class="fas fa-user"></i></div>
        @can("read-admins")
        <a href="{{route("admins.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        @endcan
    </div>
    </div>
    <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
        <div class="inner">
            <h3>{{$trainers}}</h3>
            <p>@lang("Trainer")</p>
        </div>
        <div class="icon"><i class="fa fa-heart"></i></div>
        @can("read-trainers")
        <a href="{{route("trainers.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        @endcan
    </div>
    </div>
    <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
        <div class="inner">
            <h3>{{$courses}}</h3>
            <p>@lang("Course")</p>
        </div>
        <div class="icon"><i class="fas fa-arrow-circle-right"></i></div>
        @can("read-courses")
        <a href="{{route("courses.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        @endcan
    </div>
    </div>
</div>

@stop