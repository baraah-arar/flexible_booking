    <div id="edit">
    <form action="#" method="POST" class="editSUserInfo">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                @csrf
                <x-form.form-group type="text" label="first name" name="f_name" value="{{auth()->user()->f_name}}"/>
                <x-form.form-group type="text" label="last name" name="l_name" value="{{auth()->user()->l_name}}" />
                <x-form.form-group type="text" label="phone number" name="phone" value="{{auth()->user()->phone}}"/>
                <x-form.form-group type="email" label="email" name="email" value="{{auth()->user()->email}}"/>
                <a class="reset-passowrd">Reset Passowrd</a>
                <!-- <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium text-gray-700">First
                            name</label>
                        <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium text-gray-700">Last
                            name</label>
                        <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                            address</label>
                        <input type="text" name="email-address" id="email-address" autocomplete="email"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone
                            number</label>
                        <input type="number" name="phone" id="phone"
                               autocomplete="phone"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="text" name="password" id="password" autocomplete="given-name"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm password</label>
                        <input type="text" name="confirm-password" id="confirm-password" autocomplete="password"
                               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div> -->
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>

</div>
