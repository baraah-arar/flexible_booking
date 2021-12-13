@props(['auth'=> false])
<div class="dropdownDivider hidden absolute mt-12 bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow w-44">
    <ul class="py-1" aria-labelledby="dropdownDividerButton">
        {!!$slot!!} 
    </ul>
    @if($auth)
        <x-logout-btn-nav/>
    @endif
</div>