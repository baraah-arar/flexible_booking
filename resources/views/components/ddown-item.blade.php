@props(['active' => false])

@php
    $classes = "text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2";
    if($active) $classes .= " bg-gray-100";
@endphp

<li>
    <a {{$attributes(['class'=> $classes])}}>
        {{ucwords($slot)}}
    </a>
</li>