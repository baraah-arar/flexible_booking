<x-layout>
    <x-page-title class="self-start my-4">Connect</x-page-title>
    <div class="flex">
        <p class="text-sm text-gray-500">welcome one more time, please Enter your Information.</p>
        <form class="mt-8 space-y-6" action="" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <x-form.form-group type="text" label="Message title" name="message"></x-form.form-group>
            </div>
        </form>
    </div>
    @include('_contact')
</x-layout>