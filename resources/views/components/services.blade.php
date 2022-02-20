<!-- use App\Http\Controllers\BookingController; -->
<x-layout>
    <div class="flex md:flex-row flex-col md:space-x-4 md:space-y-0 space-y-8 justify-between items-center w-full my-8">
        <x-page-title>Places</x-page-title>
        @if(!request()->routeIs('ind'))
            <div class="flex space-x-4">
                <a  href="{{URL::current()}}/?search=small"
                    class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">
                    Small Room
                </a>
                <a  href="{{URL::current()}}/?search=medium"
                    class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">
                    Medium Room
                </a>
                <a href="{{URL::current()}}/?search=large"
                    class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">
                    Large Room
                </a>
            </div>
        @endif
    </div>
    @if(request()->routeIs('ind'))
        <div class="individ-sec">
            <div class="self-start w-full flex flex-col">
                <h1 class="text-xl text-gray-900 dark:text-white">please select start, and end date for your
                    reservation</h1>
                <div class="indivd_form mt-8 self-center flex flex-col items-center justify-center">
                    <form action="" method="put" class="flex flex-col md:flex-row items-center justify-center">
                        @csrf
                        <div class="flex items-center justify-center mx-2">
                            <label for="date-from" class="sr-only">from</label>
                            <label for="date-from" class="p-4 w-1/5">from</label>
                            <input type="text" value="" name="start_date" id="checkIn"
                                   class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-transparent focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            <svg
                                class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex items-center justify-center mx-2">
                            <label for="checkOut" class="sr-only">to</label>
                            <label for="checkOut" class="p-4 w-1/5">to</label>
                            <input type="text" value="" name="end_date" id="checkOut"
                                   class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-transparent focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            <svg
                                class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <!-- <button type="button" value="Book" class="calender_btn mx-2 self-end py-2 px-2 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Check Time</button> -->
                    </form>
                    <!-- <div class="error_message text-red-400 text-xs font-medium"></div> -->
                </div>
            </div>
            <div class="hor-card services-card my-8 grid grid-cols-1 md:grid-cols-3" data-num-plc="01">
                <div class="w-full h-full row-start-1 col-start-1 col-end-3">
                    <div style="background-image:url('/images/indv.svg')"
                         class="bg-cover bg-no-repeat bg-center h-full w-full"></div>
                    <!-- <div style="background-image:url('/images/worker.png')" class="row-start-1 mt-10 col-start-2 col-span-2 bg-contain bg-no-repeat bg-center h-32 w-auto"></div> -->
                </div>
                <div
                    class="body-sec row-start-1 col-start-2 col-end-4 my-8 flex flex-col bg-gray-200 shadow p-8 opacity-80">
                    <div class="card-body my-4 flex flex-col">
                        <div class="border-b-2 border-gray-600 pb-8">
                            <div class="flex justify-between space-x-2 items-center">
                                <h4 class="text-2xl font-medium text-gray-900 dark:text-white">Shared Spaces</h4>
                                <!-- <span class="text-base self-end text-indigo-600 text-base font-medium">Individual</span> -->
                            </div>
                            <p class="text-base mt-6 text-gray-900 dark:text-gray-300 sm:text-lg md:text-lg">
                                Pick a desk in a room full of desks to lift your spirit up while studying, or working with the presence of others.
                            </p>
                        </div>
                        <div class="flex items-center mt-6 text-gray-900 text-base text-lg font-medium">
                            @php
                                $i=0;
                                $value=0;
                                $avg = 0;
                                foreach($places as $place){
                                    foreach($place->bookings as $book) {
                                        if(isset($book->assessment->value)){
                                            $value += $book->assessment->value;
                                            $i++;
                                        };
                                    };
                                };
                                if($value>0) $avg = $value/$i;
                            @endphp
                            <span class="{{(int)$avg>=1? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </span>
                            <span class="{{(int)$avg>=2? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </span>
                            <span class="{{(int)$avg>=3? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </span>
                            <span class="{{(int)$avg>=4? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </span>
                            <span class="{{(int)$avg>=5? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    </span>
                            <span class="mx-4 font-sm text-gray-500"> {{$i}} votes</span>
                        </div>
                        <div class="flex space-x-4 mt-8 text-gray-900 text-base text-md font-medium">
                            <span>Please select your perfect time to load places available.</span>
                        </div>
                        <div class="md:self-center w-full flex flex-wrap justify-center mt-8">
                            <form class="select_indivi">
                                <fieldset class="order-1 mb-8">
                                    <div class="select_cont flex flex-col space-x-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 sm:text-lg md:text-lg">
                                            Places Available
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <a class="book_indvidual cursor-pointer mt-8 self-end py-2 text-base px-6 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Book
                        now</a>
                </div>
            </div>
        </div>
    @elseif($places->count() <= 0)
        <h3>No Places Available yet.</h3>
    @else
        @foreach($places as $place)
            <div class="hor-card services-card booking card-number w-full my-16 gap-x-4 grid grid-cols-1 md:grid-cols-2"
                 data-num-plc="0{{$loop->index + 1}}">
                <div class="img-sec row-start-1 col-start-1 md:col-end-2">
                    <div
                        style="background-image:url('{{ $place->image != null ? asset('storage/' . $place->image) : '/images/noimage.svg'}}')"
                        class="{{$place->image != null ? 'bg-cover' : 'bg-50%'}} bg-no-repeat bg-center h-full w-full"></div>
                    <!-- <div style="background-image:url('/images/worker.png')" class="row-start-1 mt-10 col-start-2 col-span-2 bg-contain bg-no-repeat bg-center h-32 w-auto"></div> -->
                </div>
                <div
                    class="hidden md:row-start-1 row-start-2 col-start-1 col-end-3 md:col-end-2 form-sec shadow-xl bg-gray-100 self-center w-full p-4 flex flex-col justify-start items-start">
                    <p class="text-gray-900 text-base text-lg font-medium pb-4">please choose your perfect time and
                        date</P>
                    <form action="{{URL::current()}}" method="POST" class="confirm_form w-full p-4"
                          data-form-role="confirm_form" data-place-id="{{$place->id}}">
                        @csrf
                        <div class="confirm_sections">
                            <div class="flex items-center flex-col">
                                <input type="hidden" value="{{$place->id}}" name="plc_id">
                                <div class="w-full flex flex-col justify-center items-center">
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="date-from" class="sr-only">from</label>
                                        <label for="date-from" class="p-4 w-1/5">from</label>
                                        <input type="text" readonly="readonly" vlaue="" name="start_date" id="checkIn"
                                               class="input-date-focus select_time appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg
                                            class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="checkOut" class="sr-only">to</label>
                                        <label for="checkOut" class="p-4 w-1/5">to</label>
                                        <input type="text" readonly="readonly" vlaue="" name="end_date" id="checkOut"
                                               class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg
                                            class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="hoursNum"
                                               class="sr-only">{{$place->plc_type == 'meeting'? 'Hours' : 'Days'}}</label>
                                        <label for="hoursNum"
                                               class="p-4 w-1/5">{{$place->plc_type == 'meeting'? 'Hours' : 'Days'}}</label>
                                        <input type="text" readonly="readonly" vlaue="" name="hoursNum" id="hoursNum"
                                               class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg
                                            class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <!-- <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg> -->
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="cost" class="sr-only">Cost</label>
                                        <label for="cost" class="p-4 w-1/5">Cost</label>
                                        <input type="text" readonly="readonly" vlaue="" name="cost" id="cost"
                                               class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg
                                            class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10"
                                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                            <path fill-rule="evenodd"
                                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                        <!-- <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg> -->
                                    </div>
                                <!-- <div class="w-full flex justify-between items-center">
                                <label for="date-to" class="sr-only">to</label>
                                <label for="date-to" class="p-4 w-1/5">to</label>
                                <input id="date-to" readonly="readonly" name="date_to" type="datetime-local" value="{{old('date_to')}}" autocomplete="date-to" required class="appearance-none rounded-none relative block h-10 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            </div> -->
                                </div>
                                <!-- <fieldset class="order-1">
                                <div class="flex space-x-4">
                                    <div class="flex items-center">
                                    <input id="push-everything" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">
                                        Hours
                                    </label>
                                    </div>
                                    <div class="flex items-center">
                                    <input id="push-email" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">
                                        Weekly
                                    </label>
                                    </div>
                                    <div class="flex items-center">
                                    <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">
                                        Monthly
                                    </label>
                                    </div>
                                    <div class="flex items-center">
                                    <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">
                                        Yearlly
                                    </label>
                                    </div>
                                </div>
                                </fieldset> -->
                            </div>
                            <div class="flex flex-col items-end mt-2">
                                <a type="submit" data-placeid="{{$place->id}}"
                                   class="confirm_form_btn cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Confirm
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body my-4 flex flex-col">
                    <div class="border-b-2 border-gray-300 pb-6">
                        <div class="flex justify-between space-x-2 items-center">
                            <h4 class="text-2xl font-medium text-gray-900 dark:text-white">{{$place->title}}</h4>
                            <!-- <span class="text-base self-end text-indigo-600 text-base font-medium">Individual</span> -->
                        </div>
                        <p class="text-base mt-4 text-gray-900 dark:text-gray-300 sm:text-lg md:text-lg">
                            {{$place->description}}
                        </p>
                        <div class="flex space-x-4 mt-6 text-gray-900 text-base text-lg font-medium">
                            <span>Guests to:</span><span>{{$place->capacity}}</span>
                        </div>
                    </div>
                    <div class="flex space-x-4 mt-6 text-gray-900 text-base text-lg font-medium">
                        <span>Price:</span><span>{{$place->price}} S.P <span
                                class="text-gray-700">{{$place->plc_type == 'meeting'? '/hour' : '/day'}}</span></span>
                    </div>
                    <div class="flex items-center mt-6 text-gray-900 text-base text-lg font-medium">
                        @php
                            $i=0;
                            $value=0;
                            $avg = 0;
                            foreach($place->bookings as $book) {
                                if(isset($book->assessment->value)){
                                    $value += $book->assessment->value;
                                    $i++;
                                };
                            };
                            if($value > 0) $avg = $value/$i;
                        @endphp
                        <span class="{{(int)$avg>=1? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
                        <span class="{{(int)$avg>=2? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
                        <span class="{{(int)$avg>=3? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
                        <span class="{{(int)$avg>=4? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
                        <span class="{{(int)$avg>=5? ' text-yellow-500 ' : ' text-gray-500 ' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
                        <span class="mx-4 font-sm text-gray-500"> {{$i}} votes</span>
                    </div>
                    <!-- <div class="md:self-center w-full flex flex-wrap justify-center mt-4">
                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-2 md:text-lg md:px-4 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                            <span>Hours</span>
                            <span class="text-sm text-gray-900 text-center">recurring payment</span>
                        </a>
                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-2 md:text-lg md:px-4 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                            <span>Weekly</span>
                            <span class="text-sm text-gray-900 text-center">billed annually</span>
                        </a>
                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-2 md:text-lg md:px-4 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                            <span>Monthly</span>
                            <span class="text-sm text-gray-900 text-center">recurring payment</span>
                        </a>
                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-2 md:text-lg md:px-4 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                            <span>Annual</span>
                            <span class="text-sm text-gray-900 text-center">billed annually</span>
                        </a>
                    </div> -->
                    <button type="button" data-placeid="{{$place->id}}"
                            class="book mt-6 self-end py-2 px-6 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Book now
                    </button>
                </div>
                <!-- </div> -->
            </div>
        @endforeach
    @endif
    <x-calendar action="{{URL::current()}}"></x-calendar>
    <x-extras-modal action="{{URL::current()}}" :services="$services"></x-extras-modal>
    <script>
        const date_input = document.querySelectorAll('.indivd_form .input-date-focus');
        [...date_input].map(elem => {
            elem.addEventListener('focus', () => {
                document.querySelector('#calendar-overlay').classList.remove('hidden');
                document.querySelector('#calendar-overlay').classList.add('flex');
            })
        })
        const book_btns = document.querySelectorAll('button.book');
        [...book_btns].map(elem => {
            elem.addEventListener('click', (e) => {
                document.querySelector('#calendar-overlay').classList.remove('hidden');
                document.querySelector('#calendar-overlay').classList.add('flex');
                // e.target.classList.add('opened');
                document.querySelector('.calender_btn').dataset.placeid = e.target.dataset.placeid;
            });
        });
        [...document.querySelectorAll('#calendar-overlay button.close')].map(btnClose => {
            btnClose.addEventListener('click', () => {
                console.log('close');
                document.querySelector('#calendar-overlay').classList.add('hidden');
                document.querySelector('#calendar-overlay').classList.remove('flex');
                resetCalendarForm();
            });
        });
        document.querySelector('#extras-overlay button.close').addEventListener('click', () => {
            document.querySelector('#extras-overlay').classList.add('hidden');
            document.querySelector('#extras-overlay').classList.remove('flex');
        });

        function resetCalendarForm() {
            const calendar_inputs = document.querySelectorAll('.calendar_form form input');
            [...calendar_inputs].map(input => {
                input.value = '';
            });
        };
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script type="text/javascript">
        $('document').ready(function () {
            $(".calender_btn").click(function () {
                var url = $(".calendar_form form").attr('action');
                var form_data = $(".calendar_form form").serialize();
                var plc_id = $(".calender_btn").attr('data-placeid');
                console.log(plc_id);
                if (!plc_id) {
                    $.ajax({
                        url: url,
                        type: 'put',
                        data: form_data,
                        success: function (data) {
                            if (data.status == 'failed')
                                window.location.reload();
                            else
                                displaySelectBookingForm(data);
                            // console.log(data);
                        }
                    });
                } else {
                    $.ajax({
                        url: url,
                        type: 'put',
                        data: form_data + "&plc_id=" + plc_id,
                        success: function (data) {
                            if (data.status == 'failed')
                                window.location.reload();
                            else if (data.status == false)
                                document.querySelector('.calendar_form  .error_message ').innerText = data.message;
                            else
                                displayConfirmBookingForm(data);
                            // console.log(data);
                        }
                    });
                }
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".confirm_form_btn").click(function (e) {
                const plc_id = e.target.dataset.placeid;
                // const form_confirm = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${plc_id}"]`);
                var url = $('.confirm_form[data-place-id=' + plc_id + ']').attr("action");
                var form_data = $('.confirm_form[data-place-id=' + plc_id + ']').serialize();
                const form = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${plc_id}"]`);
                console.log(form_data);
                $.ajax({
                    url: url,
                    type: 'post',
                    data: form_data,
                    success: function (data) {
                        if (data.status == 'failed')
                            window.location.reload();
                        else {
                            console.log(data);
                            form.querySelector(".confirm_form_btn").classList.add('hidden');
                            // $(".confirm_succ_msg").removeClass('hidden');
                            displayExtrasBtn(data.data.id, data.data.plc_id);
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
            $('.book_indvidual').click(function (e) {
                var start_date = document.querySelector('.indivd_form #checkIn').value;
                var end_date = document.querySelector('.indivd_form #checkOut').value;
                var plc_id = '';
                checkList = document.querySelectorAll('.select_indivi input[name="place"]');
                checkList.forEach(elem => {
                    if (elem.checked)
                        plc_id = elem.value;
                });
                if (plc_id != '') {
                    $.ajax({
                        url: '{{URL::current()}}',
                        type: 'post',
                        data: '&start_date=' + start_date + '&end_date=' + end_date + '&plc_id=' + plc_id,
                        success: function (data) {
                            if (data.status == 'failed')
                                window.location.reload();
                            else
                                // console.log(data);
                                window.location.reload();
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                }
            });

            function displaySelectBookingForm(data) {
                document.querySelector('.indivd_form #checkIn').value = data.start;
                document.querySelector('.indivd_form #checkOut').value = data.end;
                const form = document.querySelector('.select_indivi');
                const select_cont = form.querySelector('.select_cont');
                select_cont.innerText = '';
                console.log(data.data);
                data.data.forEach(place => {
                    const div = document.createElement('div');
                    div.classList.add('flex', 'items-center');
                    div.innerHTML = `<input id="${place.title}" value="${place.id}" name="place" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-indigo-300">
                                    <label for="${place.title}" class="ml-3 block text-sm font-medium text-gray-700">
                                        <span class="mx-2">${place.title}</span>
                                        <span class="mx-2">${place.price} S.P / hour</span>
                                        <span class="mx-2 text-indigo-800 font-bold">${place.price * data.hours} S.P / ${data.hours} hours</span>
                                    </label>`;
                    select_cont.appendChild(div);
                })
            }

            function displayConfirmBookingForm(data) {
                document.querySelector('.calendar_form  .error_message ').innerText = '';
                const form = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${data.data.plc_id}"]`);
                const formParent = checkParents(form, 'form-sec');
                form.querySelector('input#checkIn').value = data.data.start_date;
                form.querySelector('input#checkOut').value = data.data.end_date;
                form.querySelector('input#hoursNum').value = data.data.duration;
                form.querySelector('input#cost').value = data.data.cost;
                formParent.classList.remove('hidden');
                window.scroll(0, (formParent.offsetTop));
            }

            function displayExtrasBtn(bookID, plcID) {
                const form = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${plcID}"]`);
                const div = document.createElement('div');
                div.innerHTML = `<div class="confirm_succ_msg flex text-green-500 w-full justify-center">
                                    <svg class="w-12 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    <p class="text-green-500 flex items-center justify-between px-2">
                                        Reservation created successfully please wait until this reservation confirmed by admin.
                                    </p>
                                </div>
                                <a class="extraseervices book mt-6 self-end py-2 px-6 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-indigo-800 bg-indigo-200 hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-bookID=${bookID}>
                                    Pick Extras
                                </a>`;
                div.classList.add('extras-successbook');
                form.querySelector('.confirm_sections').appendChild(div);
                eventExtrasbtn(form);
                handleSelectExtras();
            }

            function eventExtrasbtn(form) {
                const btn = form.querySelector('.extraseervices');
                btn.addEventListener('click', () => {
                    document.querySelector('#extras-overlay').classList.toggle('hidden');
                    document.querySelector('#extras-overlay').querySelector('.book_extra_btn').dataset.bookid = btn.dataset.bookid;
                })
            }

            function handleSelectExtras() {
                const extras_elems = document.querySelectorAll('.extra_elem');
                console.log(extras_elems);
                extras_elems.forEach(extra => {
                    extra.addEventListener('click', toggleExtras)
                });
                document.querySelector('#extras-overlay .book_extra_btn').addEventListener('click', handleBookExtras);
                // .book_extra_btn
            }

            function toggleExtras(e) {
                // e.preventDefault();
                if (checkParents(e.target, 'extra_elem')) checkParents(e.target, 'extra_elem').classList.toggle('extras-selected');
                console.log('extra click');
            }

            function handleBookExtras(elem) {
                console.log('handle');
                const extras_selected = document.querySelectorAll('.extras-selected');
                const noselected_msg = document.createElement('div');
                if (extras_selected.length <= 0) {
                    noselected_msg.innerText = 'please select at least one service';
                    noselected_msg.classList.add('noselected-msg');
                    if (document.querySelector('.noselected-msg'))
                        document.querySelector('.noselected-msg').parentElement.removeChild(document.querySelector('.noselected-msg'))
                    document.querySelector('#extras-overlay .model-foter').appendChild(noselected_msg);
                } else {
                    let extrasIds = [];
                    let extrasNames = [];
                    if (document.querySelector('.noselected-msg'))
                        document.querySelector('.noselected-msg').parentElement.removeChild(document.querySelector('.noselected-msg'))
                    extras_selected.forEach(extra => {
                        extrasIds.push(extra.dataset.extraid);
                        extrasNames.push(extra.dataset.name);
                    });
                    sendBookExtraRequest(extrasIds, elem.target.dataset.bookid, extrasNames);
                }
            }

            function sendBookExtraRequest(extrasIds, bookID, extrasNames) {
                console.log(bookID);
                extrasIds.unshift(bookID)
                // const data = JSON.stringify(extrasIds);
                const data = [...extrasIds];
                // data.bookid = bookID;
                console.log(data);
                $.ajax({
                    url: '{{URL::current()}}',
                    type: 'patch',
                    dataType: 'json',
                    contentType: 'json',
                    data: JSON.stringify(data),
                    contentType: 'application/json; charset=utf-8',
                    success: function (data) {
                        console.log(data);
                        document.querySelector('#extras-overlay').classList.add('hidden');
                        addExtrasBookings(bookID, extrasNames);
                        // window.location.href = '{{URL::current()}}';
                    },
                    error: function (data) {
                        console.log('data');
                    }
                });

                function addExtrasBookings(bookID, extrasNames) {
                    const parent_div = document.querySelector(`.extraseervices[data-bookID="${bookID}"]`).parentNode;
                    extrasNames.map(elem => {
                        const booked_extra = document.createElement('div');
                        booked_extra.innerText = elem;
                        booked_extra.classList.add('booked-extra');
                        parent_div.appendChild(booked_extra);
                    });
                    const done_btn = document.createElement('div');
                    done_btn.innerText = 'done';
                    done_btn.classList.add('doneRefresh');
                    parent_div.appendChild(done_btn);
                    parent_div.querySelector('.doneRefresh').addEventListener('click', () => {
                        window.location.href = '{{URL::current()}}';
                    })
                }
            }

        }); /*end ready event*/


    </script>
</x-layout>
