<nav class="">
    <div class="md:mt-8 flex justify-between items-center md:pt-8 sm:pt-0 sm:px-6 lg:px-8">
        <!-- logo -->
        <image src="/images/logo-f7-ligth.svg" class="w-32 md:w-48 logo-img"/>
        <!-- main nav -->
        <div class="hidden md:flex">                    
            <x-nav-item href="/" :active="request()->routeIs('home')">Home</x-nav-item>                            
            <x-ddown-flex>
                <x-nav-item :active="request()->is('*' . 'services' . '*')" class="dropdownButton flex h-full">
                    <x-icons.down-arrow class="icon self-center"/><span>services</apsn>
                </x-nav-item>
                <x-dropdown>
                    <x-ddown-item href="/services/Individual" :active="request()->routeIs('ind')">Individaule desktop</x-ddown-item>
                    <x-ddown-item href="/services/private" :active="request()->is('*' . 'private')">Private desktop</x-ddown-item>
                    <x-ddown-item href="/services/meeting" :active="request()->is('*' . 'meeting')">Meeting Room</x-ddown-item>
                </x-dropdown>
            </x-ddown-flex>
            <x-nav-item href="/contact" :active="request()->is('contact')">contact us</x-nav-item>
            @auth
                <x-ddown-flex>
                    <button class="dropdownButton uppercase text-base text-white rounded-full h-11 w-11 font-medium bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300" type="button">
                        {{substr(auth()->user()->f_name, 0,1).substr(auth()->user()->l_name, 0,1)}} 
                        <!-- <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg> -->
                    </button>
                    <x-dropdown :auth="true">
                        <x-ddown-item href="/profile" :active="request()->is('' . 'profile')">Profile</x-ddown-item>
                        <x-ddown-item href="/reservations" :active="request()->is('reservations' . '*')">Reservations</x-ddown-item>
                    </x-dropdown>                                
                </x-ddown-flex>                                
            @else                  
                <a href="#login-modal" class="py-2 text-base px-4 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Log in</a>
            @endauth                        
        </div>
        <!-- humberger icon -->
        <div class="-mr-2 flex items-center md:hidden">
            <button type="button" class="mob-btn bg-gray-100 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                 <!-- Heroicon name: outline/menu -->
                <svg class="mob-btn h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>
    <!-- mobile nav -->
    <div class="mob-nav md:hidden absolute z-10 inset-x-0 p-2 transition transform origin-top-right">
        <div class="rounded-lg shadow-lg bg-gray-100 ring-2 ring-black ring-opacity-5">
            <div class="px-5 pt-4 flex items-start justify-between">
                <div class="-mr-2 order-1">
                    <x-close-btn/>
                </div>
                <div class="flex flex-col px-2 flex-grow flex-shrink-0 pb-3 space-y-1">
                    <x-nav-item href="/" :active="request()->routeIs('home')">Home</x-nav-item>
                    <x-ddown-flex>
                        <x-nav-item :active="request()->is('*' . 'services' . '*')" class="dropdownButton flex">
                            <x-icons.down-arrow class="icon"/><span>services</apsn>
                        </x-nav-item>
                        <x-dropdown>
                            <x-ddown-item href="/services/Individual" :active="request()->routeIs('ind')">Individaule desktop</x-ddown-item>
                            <x-ddown-item href="/services/private" :active="request()->is('*' . 'private')">Private desktop</x-ddown-item>
                            <x-ddown-item href="/services/meeting" :active="request()->is('*' . 'meeting')">Meeting Room</x-ddown-item>
                        </x-dropdown>
                    </x-ddown-flex>
                    <x-nav-item href="/contact" :active="request()->is('contact')">contact us</x-nav-item>
                </div>
                @auth
                    <x-ddown-flex  class="items-end">
                        <button class="dropdownButton uppercase text-base text-white rounded-full h-11 w-11 font-medium bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300" type="button">
                            {{substr(auth()->user()->f_name, 0,1).substr(auth()->user()->l_name, 0,1)}} 
                            <!-- <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg> -->
                        </button>
                        <x-dropdown :auth="true">
                            <x-ddown-item href="/profile" :active="request()->is('' . 'profile')">Profile</x-ddown-item>
                            <x-ddown-item href="/reservations" :active="request()->is('reservations' . '*')">Reservations</x-ddown-item>
                        </x-dropdown>                                
                    </x-ddown-flex>                                
                @else                  
                    <a href="#login-modal" class="py-2 text-base px-4 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Log in</a>
                @endauth               
            </div>
        </div>                            
    </div>
</nav>