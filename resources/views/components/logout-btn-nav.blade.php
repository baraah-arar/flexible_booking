<div class="py-1">
    <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="text-sm hover:bg-gray-100 text-gray-700 w-full txt-align-unset block px-4 py-2">{{__('Logout')}}</button>
    </form>
</div>