<x-layout>
    <x-page-title class="self-start my-4">Connect</x-page-title>
    <div class="flex w-full my-16 flex-col md:flex-row bg-dotted-lg">
        <div class="w-full md:w-3/5 mx-8 mb-8">
            <h2 class="text-base font-medium text-2xl text-gray-900 dark:text-white">Get in touch</h2>
            <p class="mt-6 text-base font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                How can we help you?
            </p>
            <p class="mt-6 text-base font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                We'd love to hear from you, we are always listening, just drop us a line.
            </p>
            <p class="mt-6 text-base font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                <span class="text-red-500 underline">Note</span>
                Please login before send your message.
            </p>
        </div>
        <form class="w-full md:w-4/5 bg-gray-100 z-10 shadow-lg p-4" action="" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm">
                <x-form.form-group type="text" label="Message title" name="message"></x-form.form-group>
                <div class="flex flex-col space-y-2 mb-8">
                    <label for="body" class="sr-only">Message</label>
                    <label for="body" class="">Message</label>
                    <textarea id="body" name="body" autocomplete="body" value="{{old('body')}}" required rows="4" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Message"></textarea>
                    @error('body')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <x-form.submit-btn>Send</x-form.submit-btn>
        </form>
    </div>
    @include('_contact')
</x-layout>