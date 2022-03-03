
<x-layout>
<!-- reset passowrd modal -->
        <div class="overlay topz flex items-center justify-center w-screen" id="reset-modal">
            <a href="#" class="cancel"></a>
            <div class="modal flex flex-col space-y-8 rounded md:w-3/5 w-4/5 bg-gray-200 p-8">
                <div class="modal-header flex justify-between">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">Reset Password</h1>
                    <!-- <a href="#" class="close text-xl">&times;</a> -->
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500">Please Enter your Email so we can send reset link to your email.</p>
                    <form class="mt-8 space-y-6" action="/reset-password" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <x-form.form-group type="email" label="Email Adress" name="email"></x-form.form-group>
                            <x-form.form-group type="password" label="password" name="password"></x-form.form-group>
                            <x-form.form-group type="password" label="Confirm Password" name="password_confirmation"></x-form.form-group>
                        </div>
                        <x-form.submit-btn>Reset</x-form.submit-btn>
                        <!-- <div class="flex justify-center">
                            <button type="submit" class="group relative h-12 w-1/2 flex items-center justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-indigo-400 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Send Email
                            </button>
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
                    <!-- <p class="text-sm text-gray-500">Or you don't have account</p> -->
                    <a href='/' class="font-medium text-indigo-600 hover:text-indigo-500">Back Home</a>
                </div>
            </div>
        </div>
</x-layout>
    