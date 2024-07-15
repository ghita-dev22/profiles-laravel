{{-- @props(['type','text']) --}}
@props(['type'])
<div
    class="alert alert-{{$type}}"
    role="alert">
    {{-- <strong>Alert Heading</strong> Some Word --}}
    {{$slot}}
</div>