<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Space Booking</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased {{app()->getLocale() == 'ar'? 'dirrtl' : ''}}">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center px-4 md:px-0 py-8 md:pt-0">
            <button class="ar_lan self-start absolute left-0 right-0 mt-40 text-base text-white h-8 w-8 font-medium bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300" data-lan="{{app()->getLocale()}}" type="button">
                {{app()->getLocale() == 'ar'? 'En' : 'Ar'}} 
                {{isset($_COOKIE['lan']) && app()->setLocale($_COOKIE['lan'])}}
            </button>
            <div class="flex flex-col min-h-screen w-4/5 max-w-6xl mx-auto">
                <!-- nav -->
                @include('_headerNav')
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

                            <a href="https://github.com/baraah-arar/flexible_booking" target='_blank' rel="noreferrer noopener" class="mx-2 underline">
                                Project Code
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <!-- <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a> -->
                        </div>
                    </div>

                    <div class="ml-4 sm:mt-4 md:mt-0  text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Developed by: Fatima.ma, Baraah.ar, Abd Alrahman.da
                    </div>
                </div>
            </div>
            <!-- flash message with sessions -->
            @auth
                @if(auth()->user()->status == null || auth()->user()->status == 'dactive')
                    <div class="flash-msg z-10 fixed bottom-14 flex w-full justify-center">
                        <p class="bg-red-400 opacity-95 shadow-md text-white justify-center flex items-center space-x-2 py-2 md:py-2 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto">
                            <span>{{__('Your account is not verified.')}}</span>
                            <a href="/verify-account" id="verify-flash-msg" class="verify text-white text-sm md:text-lg items-center p-2 w-30 h-12 flex justify-center rounded bg-red-500">Verify Now</a>
                            <!-- <a href="#" id="close-flash-msg" class="close text-white text-xl w-10 h-8 flex justify-center rounded bg-green-500">&times;</a> -->
                        </p>
                    </div>
                @endif
            @endauth
        </div>
        <!-- register modal -->
        <x-register-modal/>
        <!-- login modal -->
        <x-login-modal/>
        @if(session()->has('success'))
            <div class="flash-msg fixed top-3 z-10 flex w-full justify-center">
                <p class="bg-green-400 opacity-95 shadow-md text-white flex items-center justify-between space-x-2 py-2 md:py-4 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto fixed top-3">
                    {{__(session("success"))}}
                    <a id="close-flash-msg" class="close cursor-pointer text-white text-xl w-10 h-8 flex justify-center rounded bg-green-500">&times;</a>
                </p>
            </div>
        @endif
        @if(session()->has('failed'))
            <div class="flash-msg fixed top-3 z-10 flex w-full justify-center">
                <p class="bg-red-400 opacity-95 shadow-md text-white flex items-center justify-between space-x-2 py-2 md:py-4 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto fixed top-3">
                    {!!session('failed')!!}
                    <a id="close-flash-msg" class="close cursor-pointer text-white text-xl w-10 h-8 flex justify-center rounded bg-red-500">&times;</a>
                </p>
            </div>
        @endif

        @if(session()->has('prevent'))
            <div class="flash-msg fixed top-3 z-10 flex w-full justify-center">
                <p class="bg-red-400 opacity-95 shadow-md text-white flex items-center justify-between space-x-2 py-2 md:py-4 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto fixed top-3">
                    {{__(session('prevent'))}}
                    <a id="close-flash-msg" class="close cursor-pointer text-white text-xl w-10 h-8 flex justify-center rounded bg-red-500">&times;</a>
                </p>
            </div>
        @endif
        <script type="text/javascript">
            // toggle mob nav
            // const mob_nav_btn = document.querySelectorAll('.mob-btn');
            // const mob_nav     = document.querySelector('.mob-nav');
            // [...mob_nav_btn].map(btn => {
            //     console.log('click');
            //     btn.addEventListener('click', () => mob_nav.classList.toggle('hidden'));
            // });

            // change language
            document.querySelector('.ar_lan').addEventListener('click', (e)=>{
                if(e.target.dataset.lan === 'en'){
                    document.cookie = "lan=ar; expires=Thu, 18 Dec 9999 12:00:00 UTC";
                    e.target.dataset.lan = 'ar';
                    location.reload();
                }else if(e.target.dataset.lan === 'ar'){
                    document.cookie = "lan=en; expires=Thu, 18 Dec 9999 12:00:00 UTC";
                    e.target.dataset.lan = 'en';
                    location.reload();
                }
            });
            // toggling
            window.addEventListener('click', (e) => {
                // console.log(e.target.parentElement);
                // toogle mob nav
                if(e.target.classList.contains('mob-btn')){
                    const mob_nav = document.querySelector('.mob-nav');
                    mob_nav.classList.toggle('hidden');
                }
                // toggle dropdown
                const dropdown_items = document.querySelectorAll('.dropdownButton');
                [...dropdown_items].map(btn => {
                    if(e.target.classList.contains('dropdownButton') && btn === e.target  || btn === checkParents(e.target,'dropdownButton')){
                        const drop_div = btn.nextElementSibling ;
                        drop_div.classList.toggle('hidden');
                        btn.classList.toggle('open');
                        btn.querySelector('.icon') && btn.querySelector('.icon').classList.toggle('animate');
                    }
                    else if(btn !== e.target && btn.classList.contains('open')){
                        const drop_div = btn.nextElementSibling;
                        btn.classList.remove('open');
                        !drop_div.classList.contains('hidden') && drop_div.classList.add('hidden');
                    }
                });
            });
            // check parents
            function checkParents(elem, elemClass){
                while(elem.parentElement){
                    if(elem.parentElement.classList.contains(`${elemClass}`)) {
                        return elem.parentElement;
                    }
                    elem = elem.parentElement;
                }
            }

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
            if(document.querySelector('.flash-msg .close')){
                document.querySelector('.flash-msg .close').addEventListener('click',(e)=>{
                    e.target.parentElement.classList.add('hidden');
                })
            }
        </script>
    </body>
</html>
