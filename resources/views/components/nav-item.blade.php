@props(['active' => false])

@php
    $classes = "nav-item mx-1 px-3 py-2 cursor-pointer text-base font-medium text-gray-700 hover:text-gray-900";
    if($active) $classes .= " active"
@endphp

<a {{ $attributes ([ 'class' => $classes ]) }}>
    {!!($slot)!!}
</a>