<!-- use App\Http\Controllers\BookingController; -->
<x-layout>
<div class="flex md:flex-row flex-col md:space-x-4 md:space-y-0 space-y-8 justify-between items-center w-full my-8">
    <x-page-title>Places</x-page-title>
    <div class="flex space-x-4">
        <button class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Small Room</button>
        <button class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Medium Room</button>
        <button class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Large Room</button>
    </div>
</div>
<div class="hor-card hidden services-card my-8 grid grid-cols-1 md:grid-cols-3" data-num-plc="01">
                            <div class="img-sec w-full h-full">
                                <div style="background-image:url('/images/indv.svg')" class="row-start-1 col-start-1 col-span-2 bg-cover bg-no-repeat bg-center h-full w-full"></div>
                                <!-- <div style="background-image:url('/images/worker.png')" class="row-start-1 mt-10 col-start-2 col-span-2 bg-contain bg-no-repeat bg-center h-32 w-auto"></div> -->
                            </div>
                            <div class="body-sec my-8 flex flex-col bg-gray-200 shadow p-8 opacity-80">
                                <div class="card-body my-4 flex flex-col">
                                    <div class="border-b-2 border-gray-600 pb-8">
                                        <div class="flex justify-between space-x-2 items-center">
                                            <h4 class="text-2xl font-medium text-gray-900 dark:text-white">Shared Spaces</h4>
                                            <!-- <span class="text-base self-end text-indigo-600 text-base font-medium">Individual</span> -->
                                        </div>
                                        <p class="text-base mt-6 text-gray-900 dark:text-gray-300 sm:text-lg md:text-lg">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus magni vero ab voluptatum unde! Necessitatibus, quisquam. Id saepe optio doloremque? Suscipit magnam est veritatis veniam eaque dolore recusandae ducimus velit?</p>
                                    </div>
                                    <div class="flex space-x-4 mt-8 text-gray-900 text-base text-lg font-medium">
                                        <span>Price:</span><span>40LS <span class="text-gray-700">/month</span></span>
                                    </div>
                                    <div class="md:self-center w-full flex flex-wrap justify-center mt-8">
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Hours</span>
                                            <span class="text-sm text-gray-900 text-center">recurring payment</span>
                                        </a>
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Weekly</span>
                                            <span class="text-sm text-gray-900 text-center">billed annually</span>
                                        </a>
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Monthly</span>
                                            <span class="text-sm text-gray-900 text-center">recurring payment</span>
                                        </a>
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Annual</span>
                                            <span class="text-sm text-gray-900 text-center">billed annually</span>
                                        </a>
                                    </div>
                                </div>
                                <a href="/services/book-service" class="mt-8 self-end py-2 text-base px-6 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Book now</a>
                            </div>
                        </div>

<div class="hor-card hidden services-card card-number my-16 gap-x-4 grid grid-cols-1 md:grid-cols-2" data-num-plc="01">
    <div class="img-sec w-full h-full">
        <div style="background-image:url('/images/mr2.jpg')" class="  bg-cover bg-no-repeat bg-center h-full w-full"></div>
            <!-- <div style="background-image:url('/images/worker.png')" class="row-start-1 mt-10 col-start-2 col-span-2 bg-contain bg-no-repeat bg-center h-32 w-auto"></div> -->
        </div>
    <div class="card-body my-4 flex flex-col">
        <div class="border-b-2 border-gray-300 pb-6">
            <div class="flex justify-between space-x-2 items-center">
                <h4 class="text-2xl font-medium text-gray-900 dark:text-white">Small Meeting Room</h4>
                <!-- <span class="text-base self-end text-indigo-600 text-base font-medium">Individual</span> -->
            </div>
            <p class="text-base mt-4 text-gray-900 dark:text-gray-300 sm:text-lg md:text-lg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus magni vero ab voluptatum unde! Necessitatibus, quisquam. Id saepe optio doloremque? Suscipit magnam est veritatis veniam eaque dolore recusandae ducimus velit?
            </p>
        </div>
        <div class="flex space-x-4 mt-6 text-gray-900 text-base text-lg font-medium">
            <span>Price:</span><span>40LS <span class="text-gray-700">/month</span></span>
        </div>
        <div class="md:self-center w-full flex flex-wrap justify-center mt-4">
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
        </div>
        <a href="/services/book-service" class="mt-6 self-end py-2 text-base px-6 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Book now</a>
    </div>
    <!-- </div> -->
</div>

@foreach($places as $place)
<div class="hor-card services-card booking card-number my-16 gap-x-4 grid grid-cols-1 md:grid-cols-2" data-num-plc="0{{$loop->index + 1}}">
    <div class="img-sec ">
        <div style="background-image:url('/images/mr0.png')" class="  bg-cover bg-no-repeat bg-center h-full w-full"></div>
            <!-- <div style="background-image:url('/images/worker.png')" class="row-start-1 mt-10 col-start-2 col-span-2 bg-contain bg-no-repeat bg-center h-32 w-auto"></div> -->
    </div>
    <div class="hidden form-sec shadow-xl bg-gray-100 self-center w-full p-4 flex flex-col justify-start items-start">
        <p class="text-gray-900 text-base text-lg font-medium pb-4">please choose your perfect time and date</P>
        <form action="{{URL::current()}}" method="POST" class="confirm_form w-full p-4" data-form-role="confirm_form" data-place-id="{{$place->id}}">
            @csrf
            <div class="confirm_sections">
                <div class="flex items-center flex-col">
                    <input type="hidden" value="{{$place->id}}" name="plc_id">
                        <div class="w-full flex flex-col justify-center items-center">
                            <div class="w-full flex items-center justify-center mx-2">
                                <label for="date-from" class="sr-only">from</label>
                                <label for="date-from" class="p-4 w-1/5">from</label>
                                <input type="text" readonly="readonly" vlaue="" name="start_date" id="checkIn" class="input-date-focus select_time appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="w-full flex items-center justify-center mx-2">
                                <label for="checkOut" class="sr-only">to</label>
                                <label for="checkOut" class="p-4 w-1/5">to</label>
                                <input type="text" readonly="readonly" vlaue="" name="end_date" id="checkOut" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                            <div class="w-full flex items-center justify-center mx-2">
                                <label for="hoursNum" class="sr-only">Hours Number</label>
                                <label for="hoursNum" class="p-4 w-1/5">Hours Number</label>
                                <input type="text" readonly="readonly" vlaue="" name="hoursNum" id="hoursNum" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                <!-- <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg> -->
                            </div>
                            <div class="w-full flex items-center justify-center mx-2">
                                <label for="cost" class="sr-only">Cost</label>
                                <label for="cost" class="p-4 w-1/5">Cost</label>
                                <input type="text" readonly="readonly" vlaue="" name="cost" id="cost" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
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
                    <a type="submit" data-placeid="{{$place->id}}" class="confirm_form_btn cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
        </div>
        <div class="flex space-x-4 mt-6 text-gray-900 text-base text-lg font-medium">
            <span>Price:</span><span>{{$place->price}} LS <span class="text-gray-700">/Hour</span></span>
        </div>
        <div class="flex mt-6 text-gray-900 text-base text-lg font-medium">
            <span>
                <svg class="w-5 h-5 text-yellow-500" fill="currentColor"  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
            <span>
                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
            <span>
                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
            <span>
                <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
            <span>
                <svg class="w-5 h-5 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
            </span>
             
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
        <button type="button" data-placeid="{{$place->id}}" class="book mt-6 self-end py-2 px-6 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Book now</button>
    </div>
    <!-- </div> -->
</div>
@endforeach
<x-calendar action="{{URL::current()}}"></x-calendar>
<x-extras-modal action="{{URL::current()}}" :services="$services"></x-extras-modal>
<script>
    // const date_input = document.querySelectorAll('.input-date-focus');
    // [...date_input].map(elem => {
    //     elem.addEventListener('focus', ()=>{
    //     document.querySelector('#calendar-overlay').classList.remove('hidden');
    //     document.querySelector('#calendar-overlay').classList.add('flex');
    //     })
    // })
    const book_btns = document.querySelectorAll('button.book');
    [...book_btns].map(elem => {
        elem.addEventListener('click', (e)=>{
            document.querySelector('#calendar-overlay').classList.remove('hidden');
            document.querySelector('#calendar-overlay').classList.add('flex');
            // e.target.classList.add('opened');
            document.querySelector('.calender_btn').dataset.placeid = e.target.dataset.placeid;
        });
    });
    document.querySelector('#calendar-overlay button.close').addEventListener('click', ()=>{
        document.querySelector('#calendar-overlay').classList.add('hidden');
        document.querySelector('#calendar-overlay').classList.remove('flex');
        resetCalendarForm();
    });
    function resetCalendarForm(){
        const calendar_inputs = document.querySelectorAll('.calendar_form form input'); 
        [...calendar_inputs].map(input => {input.value = '';});
    };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script type="text/javascript">
        $('document').ready(function(){
            $(".calender_btn").click(function(){
                var url = $(".calendar_form form").attr('action');
                var form_data = $(".calendar_form form").serialize();
                var plc_id = $(".calender_btn").attr('data-placeid'); 
                console.log(plc_id);
                $.ajax({
                    url: url,
                    type: 'put',
                    data: form_data + "&plc_id=" + plc_id ,
                    success: function(data){
                        displayConfirmBookingForm(data);
                        // console.log(data);                           
                    }
                });
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".confirm_form_btn").click(function(e){
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
                    success: function(data){
                        console.log(data);
                        form.querySelector(".confirm_form_btn").classList.add('hidden');
                        // $(".confirm_succ_msg").removeClass('hidden');
                        displayExtrasBtn(data.data.id, data.data.plc_id);
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
            function displayConfirmBookingForm(data){
                const form = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${data.data.plc_id}"]`);
                const formParent = checkParents(form, 'form-sec');
                console.log(form);
                form.querySelector('input#checkIn').value = data.data.start_date;
                form.querySelector('input#checkOut').value = data.data.end_date;
                form.querySelector('input#hoursNum').value = data.data.numberHours;
                form.querySelector('input#cost').value = data.data.cost;
                formParent.classList.remove('hidden');
                // console.log(form.querySelector('input#cost'));                
            }
            function displayExtrasBtn(bookID, plcID){
                const form = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${plcID}"]`);
                const div = document.createElement('div');
                div.innerHTML = `<div class="confirm_succ_msg flex text-green-500 w-full justify-center">
                                    <svg class="w-12 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    <p class="text-green-500 flex items-center justify-between px-2">
                                        Reservation created successfully please wait untail this reservation confirmed by admin.
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
            function eventExtrasbtn(form){
                const btn = form.querySelector('.extraseervices');
                btn.addEventListener('click', () => {
                    document.querySelector('#extras-overlay').classList.toggle('hidden');
                    document.querySelector('#extras-overlay').querySelector('.book_extra_btn').dataset.bookid = btn.dataset.bookid;
                })
            }
            
            function handleSelectExtras(){
                const extras_elems = document.querySelectorAll('.extra_elem');
                console.log(extras_elems);
                extras_elems.forEach(extra => {
                    extra.addEventListener('click', toggleExtras)
                });
                document.querySelector('#extras-overlay .book_extra_btn').addEventListener('click', handleBookExtras);
                // .book_extra_btn
            }
            function toggleExtras(e){
                        // e.preventDefault();
                        if(checkParents(e.target,'extra_elem')) checkParents(e.target,'extra_elem').classList.toggle('extras-selected');
                        console.log('extra click');
            }
            function handleBookExtras(elem){
                console.log('handle');
                const extras_selected = document.querySelectorAll('.extras-selected');
                const noselected_msg  = document.createElement('div');
                if(extras_selected.length<=0){
                    noselected_msg.innerText = 'please select at least one service';
                    noselected_msg.classList.add('noselected-msg');
                    if(document.querySelector('.noselected-msg'))
                       document.querySelector('.noselected-msg').parentElement.removeChild(document.querySelector('.noselected-msg'))
                    document.querySelector('#extras-overlay .model-foter').appendChild(noselected_msg);
                }else{
                    let extrasIds = [];
                    let extrasNames = [];
                    if(document.querySelector('.noselected-msg'))
                       document.querySelector('.noselected-msg').parentElement.removeChild(document.querySelector('.noselected-msg'))
                    extras_selected.forEach(extra => {
                        extrasIds.push(extra.dataset.extraid);
                        extrasNames.push(extra.dataset.name);
                    });
                    sendBookExtraRequest(extrasIds,elem.target.dataset.bookid, extrasNames);
                }
            }
            function sendBookExtraRequest(extrasIds, bookID, extrasNames){
                console.log(bookID);
                extrasIds.unshift(bookID)
                // const data = JSON.stringify(extrasIds);
                const data = [...extrasIds];
                // data.bookid = bookID;
                console.log(data);
                $.ajax({
                    url: '/services/meeting',
                    type: 'patch',
                    dataType: 'json',
                    contentType: 'json',
                    data: JSON.stringify(data),
                    contentType: 'application/json; charset=utf-8',
                    success: function(data){
                        console.log(data);
                        document.querySelector('#extras-overlay').classList.add('hidden');
                        addExtrasBookings(bookID, extrasNames);
                        // window.location.href = '{{URL::current()}}';
                    },
                    error: function(data){
                        console.log('data');
                    }
                });
                function addExtrasBookings(bookID, extrasNames){
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
                    parent_div.querySelector('.doneRefresh').addEventListener('click', ()=>{
                        window.location.href = '{{URL::current()}}';
                    })
                }
            }

        }); /*end ready event*/

        
        
    </script>
</x-layout>