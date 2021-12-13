@props(['id'])
<div class="overlay hidden flex items-center justify-center fixed inset-0 w-screen min-h-screen bg-opacity-80 bg-gray-700" id="{{$id}}">
    <a href="#" class="cancel"></a>
    <div class="modal flex flex-col overflow-auto max-h-screen space-y-8 rounded md:w-3/5 w-11/12 bg-gray-200 p-8">
        {!!$slot!!}
    </div>
</div>