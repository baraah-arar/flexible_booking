@props(['closeDes' => '#'])
<div class="modal-header flex justify-between">
    <h1 class="text-lg leading-6 font-medium text-gray-900">{{ucwords($slot)}}</h1>
    @if($closeDes !== '')
    <a href="{{$closeDes}}" class="close text-xl">&times;</a>
    @else
    <button class="close text-xl">&times;</button>
    @endif
</div>