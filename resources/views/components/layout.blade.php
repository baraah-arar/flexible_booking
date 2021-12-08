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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center px-4 md:px-0 py-8 md:pt-0">
        
            

            <div class="flex flex-col min-h-screen w-4/5 max-w-6xl mx-auto">
                <!-- nav -->
                <nav>
                    <div class="md:mt-8 flex justify-between items-center md:pt-8 sm:pt-0 sm:px-6 lg:px-8">
                        <image src="/images/logo-f7-ligth.svg" class="w-32 md:w-48 logo-img"/>
                        <div class="hidden md:flex space-x-1">                    
                            <a href="" class="px-3 py-2 text-base font-medium text-gray-700 border-gray-700 border-b-2 hover:border-gray-700 hover:text-gray-900">Home</a>
                            <a href="" class="px-3 py-2 text-base font-medium text-gray-700 border-transparent border-b-2 hover:border-gray-700 hover:text-gray-900">Services</a>
                            <a href="" class="px-3 py-2 text-base font-medium text-gray-700 border-transparent border-b-2 hover:border-gray-700 hover:text-gray-900">Contact us</a>
                            @auth
                                <div class="relative ">
                                <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="uppercase text-base text-white rounded-full h-11 w-11 font-medium bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300" type="button">
                                    {{substr(auth()->user()->f_name, 0,1).substr(auth()->user()->l_name, 0,1)}} 
                                    <!-- <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg> -->
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownDivider" class="absolute bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow w-44">
                                    <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Bookings</a>
                                    </li>
                                    </ul>
                                    <div class="py-1">
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button type="submit" class="text-sm text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Logout</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                                
                            @else                  
                                <a href="#login-modal" class="py-2 text-base px-4 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Log in</a>
                            @endauth                        
                        </div>
                        <!-- humberger icon -->
                        <div class="-mr-2 flex items-center md:hidden">
                            <button type="button" class="mob-btn bg-gray-100 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                    <!-- Heroicon name: outline/menu -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                            </button>
                        </div>
                    </div>

                    <!-- mobile nav -->
                    <div class="mob-nav md:hidden absolute z-10 inset-x-0 p-2 transition transform origin-top-right">
                        <div class="rounded-lg shadow-lg bg-gray-100 ring-2 ring-black ring-opacity-5 overflow-hidden">
                            <div class="px-5 pt-4 flex items-start justify-between">
                                <div class="-mr-2 order-1">
                                    <button type="button" class="mob-btn bg-gray-100 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                        <span class="sr-only">Close main menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="flex flex-col px-2 flex-grow flex-shrink-0 pb-3 space-y-1">
                                    <a href="" class="px-3 py-2 text-base font-medium text-gray-700 border-gray-700 border-b-2 hover:border-gray-700 hover:text-gray-900">Home</a>
                                    <a href="" class="px-3 py-2 text-base font-medium text-gray-700 border-transparent border-b-2 hover:border-gray-700 hover:text-gray-900">Services</a>
                                    <a href="" class="px-3 py-2 text-base font-medium text-gray-700 border-transparent border-b-2 hover:border-gray-700 hover:text-gray-900">Contact us</a>                   
                                    <a href="" class="py-2 text-base px-4 text-white text-center font-medium bg-indigo-600 hover:bg-indigo-700">Log in</a> 
                                </div>
                            </div>
                        </div>                            
                    </div>
                </nav>
                <!-- main content -->
                <div class="flex flex-col items-center mt-12 md:mt-8 flex-shrink-0 flex-grow dark:bg-gray-800 overflow-hidden sm:px-6 lg:px-8">
                   {{$slot}}
                    
                </div>
                <!-- footer -->
                <div class="footer flex flex-col md:flex-row justify-center mt-4 items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <!-- <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg> -->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="1.03em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 250"><path d="M128.001 0C57.317 0 0 57.307 0 128.001c0 56.554 36.676 104.535 87.535 121.46c6.397 1.185 8.746-2.777 8.746-6.158c0-3.052-.12-13.135-.174-23.83c-35.61 7.742-43.124-15.103-43.124-15.103c-5.823-14.795-14.213-18.73-14.213-18.73c-11.613-7.944.876-7.78.876-7.78c12.853.902 19.621 13.19 19.621 13.19c11.417 19.568 29.945 13.911 37.249 10.64c1.149-8.272 4.466-13.92 8.127-17.116c-28.431-3.236-58.318-14.212-58.318-63.258c0-13.975 5-25.394 13.188-34.358c-1.329-3.224-5.71-16.242 1.24-33.874c0 0 10.749-3.44 35.21 13.121c10.21-2.836 21.16-4.258 32.038-4.307c10.878.049 21.837 1.47 32.066 4.307c24.431-16.56 35.165-13.12 35.165-13.12c6.967 17.63 2.584 30.65 1.255 33.873c8.207 8.964 13.173 20.383 13.173 34.358c0 49.163-29.944 59.988-58.447 63.157c4.591 3.972 8.682 11.762 8.682 23.704c0 17.126-.148 30.91-.148 35.126c0 3.407 2.304 7.398 8.792 6.14C219.37 232.5 256 184.537 256 128.002C256 57.307 198.691 0 128.001 0zm-80.06 182.34c-.282.636-1.283.827-2.194.39c-.929-.417-1.45-1.284-1.15-1.922c.276-.655 1.279-.838 2.205-.399c.93.418 1.46 1.293 1.139 1.931zm6.296 5.618c-.61.566-1.804.303-2.614-.591c-.837-.892-.994-2.086-.375-2.66c.63-.566 1.787-.301 2.626.591c.838.903 1 2.088.363 2.66zm4.32 7.188c-.785.545-2.067.034-2.86-1.104c-.784-1.138-.784-2.503.017-3.05c.795-.547 2.058-.055 2.861 1.075c.782 1.157.782 2.522-.019 3.08zm7.304 8.325c-.701.774-2.196.566-3.29-.49c-1.119-1.032-1.43-2.496-.726-3.27c.71-.776 2.213-.558 3.315.49c1.11 1.03 1.45 2.505.701 3.27zm9.442 2.81c-.31 1.003-1.75 1.459-3.199 1.033c-1.448-.439-2.395-1.613-2.103-2.626c.301-1.01 1.747-1.484 3.207-1.028c1.446.436 2.396 1.602 2.095 2.622zm10.744 1.193c.036 1.055-1.193 1.93-2.715 1.95c-1.53.034-2.769-.82-2.786-1.86c0-1.065 1.202-1.932 2.733-1.958c1.522-.03 2.768.818 2.768 1.868zm10.555-.405c.182 1.03-.875 2.088-2.387 2.37c-1.485.271-2.861-.365-3.05-1.386c-.184-1.056.893-2.114 2.376-2.387c1.514-.263 2.868.356 3.061 1.403z" fill="currentColor"/></svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Project Code
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Developed by: Fatima.ma, Baraah.ar, Abd Alrahman.da
                    </div>
                </div>
            </div>
            @auth
            @if(auth()->user()->status == null)
                <div class="flash-msg fixed bottom-14 flex w-full justify-center">
                    <p class="bg-red-400 opacity-95 shadow-md text-white justify-center flex items-center space-x-2 py-2 md:py-2 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto">
                        <span>Your account nis not verified.</span>
                        <a href="verify-account" id="verify-flash-msg" class="verify text-white text-sm md:text-lg items-center p-2 w-30 h-12 flex justify-center rounded bg-red-500">Verify Now</a>
                        <!-- <a href="#" id="close-flash-msg" class="close text-white text-xl w-10 h-8 flex justify-center rounded bg-green-500">&times;</a> -->
                    </p>
                </div>
            @endif
            @endauth
        </div>
        <!-- register modal -->
        <div class="overlay hidden flex items-center justify-center fixed inset-0 w-screen min-h-screen bg-opacity-80 bg-gray-700" id="register">
            <a href="#" class="cancel"></a>
            <div class="modal flex flex-col overflow-auto max-h-screen space-y-8 rounded md:w-3/5 w-11/12 bg-gray-200 p-8">
                <div class="modal-header flex justify-between">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">We are happy for joining us</h1>
                    <a href="#" class="close text-xl">&times;</a>
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500">welcome to our community, please Enter your Information.</p>
                    <form class="mt-8 space-y-6" action="register" method="POST">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="f-name" class="sr-only">First Name</label>
                                <label for="f-name" class="">First Name</label>
                                <input id="f-name" name="f_name" type="text" value="{{old('f_name')}}" autocomplete="f-name" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="First Name">
                                @error('f_name')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="l-name" class="sr-only">Last Name</label>
                                <label for="l-name" class="">Last Name</label>
                                <input id="l-name" name="l_name" type="text" value="{{old('l_name')}}" autocomplete="l-name" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Last Name">
                                @error('l_name')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="ph-num" class="sr-only">Phone Number</label>
                                <label for="ph-num" class="">Phone Number</label>
                                <input id="ph-num" name="phone" type="text" value="{{old('phone')}}" autocomplete="ph-num" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone Number">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="email" class="sr-only">Email address</label>
                                <label for="email" class="">Email address</label>
                                <input id="email" name="email" type="email" value="{{old('email')}}" autocomplete="email" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <label for="password" class="">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="flex flex-col">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                    Remember me
                                </label>
                            </div>

                            <div class="text-sm self-end">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Forgot your password?
                                </a>
                            </div>
                        </div> -->

                        <div class="flex justify-center">
                            <button type="submit" class="group relative h-12 w-1/2 flex items-center justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: solid/lock-closed -->
                                <svg class="h-5 w-5 text-indigo-400 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Register
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
                    <p class="text-sm text-gray-500">Or you already have account</p>
                    <a href='#login-modal' class="font-medium text-indigo-600 hover:text-indigo-500">Login Now</a>
                </div>
            </div>
        </div>
        <!-- login modal -->
        <div class="overlay hidden flex items-center justify-center fixed inset-0 w-screen min-h-screen bg-opacity-80 bg-gray-700" id="login-modal">
            <a href="#" class="cancel"></a>
            <div class="modal flex flex-col space-y-8 rounded md:w-3/5 w-11/12 bg-gray-200 p-8">
                <div class="modal-header flex justify-between">
                    <h1 class="text-lg leading-6 font-medium text-gray-900">Welcome back</h1>
                    <a href="#" class="close text-xl">&times;</a>
                </div>
                <div class="modal-body">
                    <p class="text-sm text-gray-500">welcome one more time, please Enter your Information.</p>
                    <form class="mt-8 space-y-6" action="/login" method="POST">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        <div class="rounded-md shadow-sm -space-y-px">
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="email" class="sr-only">Email address</label>
                                <label for="email" class="">Email address</label>
                                <input id="email" name="email" type="email" autocomplete="email" value="{{old('email')}}" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col space-y-2 mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <label for="password" class="">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block h-12 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                @enderror
                            </div>
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

                        <div class="flex justify-center">
                            <button type="submit" class="group relative h-12 w-1/2 flex items-center justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <!-- Heroicon name: solid/lock-closed -->
                                <svg class="h-5 w-5 text-indigo-400 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                            Sign in
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer flex justify-center items-center space-x-2 border-t border-gray-300 py-4">
                    <p class="text-sm text-gray-500">Or you don't have account</p>
                    <a href='#register' class="font-medium text-indigo-600 hover:text-indigo-500">Register Now</a>
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
        <script type="text/javascript">
            // toggle mob nav
            const mob_nav_btn = document.querySelectorAll('.mob-btn');
            const mob_nav     = document.querySelector('.mob-nav');
            [...mob_nav_btn].map(btn => {
                console.log('click');
                btn.addEventListener('click', () => mob_nav.classList.toggle('hidden'));
            });

            // on scroll animation -2- intersection observer 
            const sliderImages = document.querySelectorAll('.slide-img');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    console.log(entry);
                    if(entry.intersectionRatio > 0)
                        entry.target.classList.add('active');
                    else
                        entry.target.classList.remove('active');
                })
            });

            sliderImages.forEach(elem => {
                observer.observe(elem);
            });
        </script>
    </body>
</html>
