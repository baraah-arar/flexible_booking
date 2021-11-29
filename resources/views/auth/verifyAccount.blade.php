
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
<!-- forgot passowrd modal -->
    <div class="overlay flex items-center justify-center fixed inset-0 w-screen min-h-screen bg-opacity-80 bg-gray-700" id="login-modal">
            <a href="#" class="cancel"></a>
            <div class="modal flex flex-col space-y-8 rounded md:w-3/5 w-11/12 bg-gray-200 p-8">
                <div class="modal-header flex justify-between">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">Verify Account</h1>
                    <a href="#" class="close text-xl">&times;</a>
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500">Code Verification is sent, check your email to get the code.</p>
                    <a href='verify-account/sendcode' class="font-medium text-indigo-600 hover:text-indigo-500">Send Verification Code</a>
                    <form class="mt-8 space-y-6" action="verify-account" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="ver-code" class="sr-only">Enter Verification Code</label>
                                <label for="ver-code" class="">Enter Verification Code</label>
                                <input id="ver-code" name="ver_code" type="text" autocomplete="ver-code" value="{{old('ver_code')}}" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="">
                                @error('ver-code')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" class="group relative h-12 w-1/2 flex items-center justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: solid/lock-closed -->
                                <!-- <svg class="h-5 w-5 text-indigo-400 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg> -->
                            </span>
                            Verify
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
                    <!-- <p class="text-sm text-gray-500">Or you don't have account</p> -->
                    <a href='/' class="font-medium text-indigo-600 hover:text-indigo-500">Back Home</a>
                </div>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="flash-msg fixed top-3 flex w-full justify-center">
                <p class="bg-green-400 opacity-95 shadow-md text-white flex items-center justify-between space-x-2 py-2 md:py-4 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto fixed top-3">
                    {{session('success')}}
                    <a href="#" id="close-flash-msg" class="close text-white text-xl w-10 h-8 flex justify-center rounded bg-green-500">&times;</a>
                </p>
            </div>
        @endif
    </body>
</html>