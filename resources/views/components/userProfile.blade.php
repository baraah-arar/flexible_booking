<x-layout>
    <div class="w-full">
        <div class="flex flex-col lg:flex-row">
            <div class="">
                <div class="px-4 sm:px-0">
                    <div class="md:flex flex-col md:flex-row lg:min-h-screen w-full">
                        <div class="flex flex-col w-full md:w-64 text-gray-700 dark-mode:text-gray-200 dark-mode:bg-gray-800 ">
                            <nav class="side-nav flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                                <a class="{{request()->is('' . 'reservations' . '*')? 'bg-gray-200' : '';}} block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="/reservations">My Reservations</a>
                                <a class="{{request()->is('' . 'profile')? 'bg-gray-200' : '';}} block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="/profile">Edit Profile</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div id="user-sidebar" class="mt-5 md:mt-0 p-2 overflow-auto w-full">
                {{--Edit settings--}}  {{--my reservations--}}
                {{$slot}}               
            </div>
        </div>
    </div>

</x-layout>
