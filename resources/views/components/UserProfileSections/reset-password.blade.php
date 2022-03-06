

<x-layout>
        <div class="flex items-center justify-center w-screen" id="reset-modal">
            <div class="modal flex flex-col space-y-8 rounded md:w-3/5 w-11/12 bg-gray-200 p-8">
                <div class="modal-header flex justify-between">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">{{__('Reset Password')}}</h1>                    
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500">{{__('Please Enter your old password and new one.')}}</p>
                    <form class="mt-8 space-y-6 resetUserpassowrd disable" action="/profile/resetPassword" method="POST">
                        @csrf                         
                        <div class="rounded-md shadow-sm">                            
                            <x-form.form-group type="password" label="{{__('old password')}}" name="old_password"></x-form.form-group>
                            <x-form.form-group type="password" label="{{__('new passowrd')}}" name="password"/>
                            <x-form.form-group type="password" label="{{__('Confirm Password')}}" name="password_confirmation"></x-form.form-group>
                        </div>
                        <x-form.submit-btn>{{__('Reset')}}</x-form.submit-btn>
                    </form>
                </div>
                <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
 
                    <a href='/profile' class="font-medium text-indigo-600 hover:text-indigo-500">{{__('Back')}}</a>
                </div>
            </div>
        </div>
</x-layout>
    