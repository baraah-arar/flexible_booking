<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Space Booking</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
                @if(session()->has('success'))
                <div class="flash-msg fixed top-3 z-10 flex w-full justify-center">
                    <p class="bg-green-400 timer=15 opacity-95 shadow-md text-white flex items-center justify-between space-x-2 py-2 md:py-4 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto fixed top-3">
                        {{session('success')}}

                   </p>
                </div>
            @endif
            @if(session()->has('failed'))
                <div class="flash-msg fixed top-3 z-10 flex w-full justify-center">
                    <p class="bg-red-400 opacity-95 shadow-md text-white flex items-center justify-between space-x-2 py-2 md:py-4 px-4 text-lg md:text-xl md:w-2/4 w-4/5 mx-auto fixed top-3">
                        {!!session('failed')!!}

                    </p>
                </div>
            @endif
        <div class="min-h-full">
            <nav class="bg-gray-900">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                  <div class="flex items-center">
                    <div class="flex-shrink-0">
                      <a href='/'>
                      <img class="h-20 w-20" src="/images/logo-f7-ligth.svg" alt="logo">
                      </a>
                    </div>
                    <div class="hidden md:block">
                      <div class="ml-10 flex items-baseline space-x-4">

                        <a href="{{ route('dashboard.index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

                        <a href="{{ route('dashboard.users')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Users</a>

                        <a href="{{ route('dashboard.bookings_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Bookings</a>

                        <a href="{{ route('dashboard.places_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Places</a>

                        <a href="{{ route('dashboard.services_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Services</a>

                        <a href="{{ route('dashboard.opinions_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Opinions</a>

                        <a href="{{ route('dashboard.statistics')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">statistics</a>


                      </div>
                    </div>
                  </div>
                  <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                      <!-- <button type="button" class="bg-gray-900 p-1 rounded-full text-indigo-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        Heroicon name: outline/bell
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                      </button> -->
                      <form method="POST" action="/logout">
                        @csrf
                        <!-- <a href="{{ route('home')}}" class="bg-gray-900 p-1 rounded-full text-indigo-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"> -->
                          <button type="submit" class="bg-gray-900 p-1 rounded-full text-indigo-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                          </button>
                        <!-- </a> -->
                      </form>
                    </div>
                  </div>
                  <div class="-mr-2 flex md:hidden">
                    {{-- <button type="button" class="bg-gray-900 p-1 rounded-full text-indigo-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button> --}}
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="bg-gray-900 p-1 rounded-full text-indigo-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                         </svg>
                        </button>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Mobile menu, show/hide based on menu state. -->
              <div class="md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <a href="{{ route('dashboard.index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

                  <a href="{{ route('dashboard.users')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Users</a>

                  <a href="{{ route('dashboard.bookings_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Bookings</a>

                  <a href="{{ route('dashboard.places_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Places</a>

                  <a href="{{ route('dashboard.services_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Services</a>

                  <a href="{{ route('dashboard.opinions_index')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Opinions</a>

                  <a href="{{ route('dashboard.statistics')}}" class="text-indigo-300 hover:bg-indigo-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">statistics</a>

                </div>

              </div>
            </nav>

            <header class="bg-white shadow">
              <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-indigo-600">
                  Dashboard
                </h1>
              </div>
            </header>
            <main>
              <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-4">
                <!-- Replace with your content -->

                <div class="px-4 py-6 sm:px-0">

                  <div class="border-4 border-dashed border-indigo-200 rounded-lg h-100">
                      <!-- This example requires Tailwind CSS v2.0+ -->
                        {{$slot}}
                </div>
              </div>
            </div>
          </div>

                  </div>
                </div>
                <!-- /End replace -->
              </div>
            </main>
          </div>
    </body>
</html>
