<x-layout>
    <body>
    <div class="mt-10 sm:mt-0 ">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 ml-0 mr-32">
                <div class="px-4 sm:px-0">
                    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
                        <div @click.away="open = false"
                             class="flex flex-col w-full md:w-64 text-gray-700 dark-mode:text-gray-200 dark-mode:bg-gray-800  "
                             x-data="{ open: false }">
                            <nav class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   onclick="showRes()"
                                   href="#">My Reservations</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   onclick="showEdit()"
                                   href="#">Edit Profile</a>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div id="user-sidebar" class="mt-5 md:mt-0 md:col-span-2 ml-px ">
                {{--Edit settings--}}
                <x-UserProfileSections.Change-user-settings></x-UserProfileSections.Change-user-settings>
                {{--my reservations--}}
                <x-UserProfileSections.Crud-user-reservations></x-UserProfileSections.Crud-user-reservations>
            </div>
        </div>
    </div>
    </body>
</x-layout>
