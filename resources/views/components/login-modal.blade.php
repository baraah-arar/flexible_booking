<x-modal-overlay id="login-modal">
    <x-modal-header>Welcome back</x-modal-header>
    <div class="modal-body">
        <p class="text-sm text-gray-500">welcome one more time, please Enter your Information.</p>
         <form class="mt-8 space-y-6" action="/login" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <x-form.form-group type="email" label="Email Adress" name="email"></x-form.form-group>
                <x-form.form-group type="password" label="Password" name="passowrd"></x-form.form-group>
            </div>
            <div class="flex flex-col">
                <!-- <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div> -->
                <div class="text-sm self-end">
                    <a href="forget-password" class="font-medium text-indigo-600 hover:text-indigo-500">
                        Forgot your password?
                    </a>
                </div>
            </div>
            <x-form.submit-btn>login</x-form.submit-btn>
        </form>
    </div>
    <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
        <p class="text-sm text-gray-500">Or you don't have account</p>
        <a href='#register' class="font-medium text-indigo-600 hover:text-indigo-500">Register Now</a>
    </div>
</x-modal-overlay>