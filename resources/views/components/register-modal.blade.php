<x-modal-overlay id="register">
    <x-modal-header>We are happy for joining us</x-modal-header>
    <div class="modal-body">
        <p class="text-sm text-gray-500">welcome to our community, please Enter your Information.</p>
        <form class="mt-8 space-y-6" action="/register" method="POST">
            @csrf
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <x-form.form-group type="text" label="First Name" name="f_name"></x-form.form-group>
                <x-form.form-group type="text" label="Last Name" name="l_name"></x-form.form-group>
                <x-form.form-group type="text" label="Phone Number" name="phone"></x-form.form-group>
                <x-form.form-group type="email" label="Email Adress" name="email"></x-form.form-group>
                <x-form.form-group type="password" label="password" name="password"></x-form.form-group>
            </div>
            <!-- <div class="flex flex-col">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
            </div> -->
            <x-form.submit-btn>register</x-form.submit-btn>
        </form>
    </div>
    <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
        <p class="text-sm text-gray-500">Or you already have account</p>
        <a href='#login-modal' class="font-medium text-indigo-600 hover:text-indigo-500">Login Now</a>
    </div>
</x-modal-overlay>