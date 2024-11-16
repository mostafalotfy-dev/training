
<div class="row">
    <div class="col-md-12">
        <label for="name">@lang("Name")</label>
        {{html()->text("name")->class("form-control")->required()}}
        @error("name")
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    @foreach ($permissions as $permission )
        <div class="col-md-3">
            @isset($role)
                {{html()->checkbox("permissions[]",$role->permissions->contains($permission->id),$permission->id)}} {{$permission->name}}
                @error("permissions[]")
                 <div class="text-danger">{{$message}}</div>
                @enderror
            @else
                {{html()->checkbox("permissions[]",value:$permission->id)}} {{$permission->name}}
                @error("permissions[]")
                <div class="text-danger">{{$message}}</div>
                @enderror
            @endisset

        </div>
    @endforeach
</div>
