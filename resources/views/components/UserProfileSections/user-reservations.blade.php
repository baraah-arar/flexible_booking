<x-userProfile>
    Reservations
    
    <!-- {{$reservations->services}} -->
  
    <div class="user-resv-card flex flex-col w-full">
        <div class="thumbnail w-full h-60 md:h-80 bg-center bg-no-repeat bg-cover" style="background-image:url('{{asset('storage/' . $reservations->place->image)}}')">
        </div>
        <div class="resv-card-body flex flex-col flex-wrap md:flex-row my-8">
            <div class="flex flex-col w-nm flex-grow">
                <h1 class="mb-4 text-base text-lg font-medium">{{$reservations->place->title}}</h1>
                <p class="mb-4">{{$reservations->place->description}}</p>
                <span class="mb-4">Attendes: {{$reservations->place->capacity}}</span>
                <span class="mb-4">Price / Hour: {{$reservations->place->price}} S.P</span>
            </div>
            <div class="flex flex-col w-nm flex-grow">
                <!-- <span>Start Date{{$reservations->satrt_date}}</span>
                <span>End Date{{$reservations->end_date}}</span>
                <span>Attendes: {{$reservations->place->capacity}}</span>
                <span>Price / Hour: {{$reservations->place->price}}</span> -->
                <form action="{{URL::current()}}" method="POST" class="confirm_form w-full" data-form-role="confirm_form" data-place-id="{{$reservations->place->id}}">
                    @csrf
                    <div class="confirm_sections">
                        <div class="flex items-center flex-col">
                            <input type="hidden" value="{{$reservations->place->id}}" name="plc_id">
                                <div class="w-full flex flex-col justify-center items-center">
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="date-from" class="sr-only">from</label>
                                        <label for="date-from" class="p-4 w-1/5">from</label>
                                        <input type="text" readonly="readonly" value="{{$reservations->start_date}}" name="start_date" id="checkIn" class="input-date-focus select_time appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="checkOut" class="sr-only">to</label>
                                        <label for="checkOut" class="p-4 w-1/5">to</label>
                                        <input type="text" readonly="readonly" value="{{$reservations->end_date}}" name="end_date" id="checkOut" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="hoursNum" class="sr-only">Hours Number</label>
                                        <label for="hoursNum" class="p-4 w-1/5">Hours Number</label>
                                        <input type="text" readonly="readonly" value="" name="hoursNum" id="hoursNum" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="cost" class="sr-only">Cost</label>
                                        <label for="cost" class="p-4 w-1/5">Cost</label>
                                        <input type="text" readonly="readonly" value="{{$reservations->cost}}" name="cost" id="cost" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                        </div>
                        <div class="flex flex-col items-end mt-2">
                            <a type="submit" data-placeid="{{$reservations->place->id}}" class="confirm_form_btn cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Confirm
                            </a>                     
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col w-full flex-grow">
                @foreach($reservations->services as $service)
                    <div class="flex w-full md:w-2/4 justify-between items-center">
                        <span class="booked-extra">{{$service->name}}</span>
                        <span class="">{{$service->pivot->status}}</span>
                    </div>
                @endforeach
                <a class="extraseervices book mt-6 self-start py-2 px-6 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-indigo-800 bg-indigo-200 hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-bookID=${bookID}>
                    Pick Extras
                </a>
            </div>
        </div>
    </div> 
        
</x-userProfile>