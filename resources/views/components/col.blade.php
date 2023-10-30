{{-- How to switch class attributes --}}
<div {{$attributes->merge(["class" => "col-xl-6 col-12"])}} >
    {{$slot}}
</div>
