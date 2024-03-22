{{-- @if ($message["type"] == ) --}}
<div 
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="alert {{ $message['type'] }} alert-dismissible fade show"
    role="alert"
>
    <strong>{{ $message["title"] }}</strong> 
    {{ $message["body"] }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>    
{{-- @else
    
@endif --}}

