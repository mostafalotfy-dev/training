

{{html()->form(method:"put",action:route("trainers.update",$id))->open()}}
    <button class="btn btn-danger btn-sm">@lang("Ban")</button>

{{html()->form()->close()}}