@props(['tagsCsv'])

@php
    $tags = explode(",", $tagsCsv);
@endphp

<ul class ="list-unstyled list-inline d-flex flex-wrap px-3 py-2 text-capitalize">
    @foreach ($tags as $tag)
        <li class="list-tag mx-2"> <a href="?tag={{$tag}}" class="text-decoration-none text-white">{{ $tag }}</a></li>
    @endforeach
</ul>
