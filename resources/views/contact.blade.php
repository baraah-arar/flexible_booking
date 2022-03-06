<x-layout>
    <x-page-title class="self-start my-4">{{__('Connect')}}</x-page-title>
    <div class="flex w-full mt-16 mb-28 flex-col md:flex-row bg-dotted-lg">
        <div class="w-full md:w-3/5 mx-8 mb-8">
            <h2 class="text-base font-medium text-2xl text-gray-900 dark:text-white">{{__('Get in touch')}}</h2>
            <p class="mt-6 text-base font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                {{__('How can we help you?')}}
            </p>
            <p class="mt-6 text-base font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                {{__("We'd love to hear from you, we are always listening, just drop us a line.")}}
            </p>
            <p class="mt-6 text-base font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                <span class="text-red-500 underline">{{__('Note')}}</span>
                {{__('Please login before send your message.')}}
            </p>
        </div>
        <form class="w-full md:w-4/5 bg-gray-100 z-10 shadow-lg p-4" action="/contact" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="">
                <x-form.form-group type="text" label="{{__('Message title')}}" name="title"></x-form.form-group>
                <div class="flex flex-col space-y-2 mb-8">
                    <label for="body" class="sr-only">Message</label>
                    <label for="body" class="">{{__('Message')}}</label>
                    <textarea id="body" name="body" autocomplete="body" value="" required rows="4" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="{{__('Message')}}">{{old('body')}}</textarea>
                    @error('body')
                        <p class="text-red-500 text-sm mt-1">{{__($message)}}</p>
                    @enderror
                </div>
                <fieldset class="order-1 mb-8">
                    <div class="flex flex-wrap">
                        <p class="text-sm w-full mb-4 font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                            {{__('your message is')}}
                        </p>
                        <div class="flex items-center">
                        <input id="complement" value="complement" name="type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-indigo-300">
                        <label for="complement" class="mx-3 block text-sm font-medium text-gray-700">
                            {{__('Complement')}}
                        </label>
                        </div>
                        <div class="flex items-center">
                        <input id="complaint" value="complaint" name="type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-indigo-300">
                        <label for="complaint" class="mx-3 block text-sm font-medium text-gray-700">
                            {{__('Complaint')}}
                        </label>
                        </div>
                    </div>
                </fieldset>
            </div>
            <x-form.submit-btn>{{__('Send')}}</x-form.submit-btn>
        </form>
    </div>
    @include('_contact')
</x-layout>