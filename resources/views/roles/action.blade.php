<a href="{{route("roles.edit",$id)}}" class="btn btn-primary btn-sm">@lang("Edit")</a >

<a href="{{route("roles.show",$id)}}"  class="btn btn-default btn-sm">@lang("Show")</a>
{{html()->form(method:"delete",action:route("roles.destroy",$id))->open()}}
    <button class="btn btn-danger btn-sm"  data-confirm-delete="true">@lang("Delete")</button>

{{html()->form()->close()}}