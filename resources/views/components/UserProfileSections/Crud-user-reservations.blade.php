<x-userProfile>
<div id="res">
    <div class="flex flex-col">
        <div class="">
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Reservation Number
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Space / service
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Start Date
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                End Date
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Cost
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Status
                            </th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Manage
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                    @foreach(auth()->user()->bookings as $coll)                        
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{$coll->id}}</div>
                            @php
                                $value = isset($coll->assessment->value)? $coll->assessment->value : 0;
                            @endphp
                            <div class="flex mt-2 text-gray-900 text-base text-lg font-medium" data-bkgid="{{$coll->id}}">
                                <span class="star-cont {{$value>=1? ' text-yellow-500 ' : ' text-gray-500 ' }} hover:text-yellow-500" data-starval="1">
                                    <svg class="star-svg w-5 h-5" fill="currentColor"  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </span>
                                <span class="star-cont {{$value>=2? ' text-yellow-500 ' : ' text-gray-500 ' }} hover:text-yellow-500" data-starval="2">
                                    <svg class="star-svg w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </span>
                                <span class="star-cont {{$value>=3? ' text-yellow-500 ' : ' text-gray-500 ' }} hover:text-yellow-500" data-starval="3"> 
                                    <svg class="star-svg w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </span>
                                <span class="star-cont {{$value>=4? ' text-yellow-500 ' : ' text-gray-500 ' }} hover:text-yellow-500" data-starval="4">
                                    <svg class="star-svg w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </span>
                                <span class="star-cont {{$value>=5? ' text-yellow-500 ' : ' text-gray-500 ' }} hover:text-yellow-500" data-starval="5">
                                    <svg class="star-svg w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </span>                                
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm font-medium leading-5 text-gray-900">
                                {{$coll->place->title}}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{$coll->start_date}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{$coll->end_date}}</div>
                        </td>
                        <td class="py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-500">{{$coll->cost}} S.P</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800
                                rounded-lg {{$coll->status == 'canceled'? 'bg-red-200 ' : ''}}
                                {{$coll->status == 'outofdate'? 'bg-gray-200 ' : ''}}
                                {{$coll->status == 'pending'? 'bg-yellow-200 ' : ''}}
                                {{$coll->status == 'active'? 'bg-green-200 ' : ''}}">
                                {{$coll->status}}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <a href="/reservations/{{$coll->id}}">
                                <svg class="manage_res w-6 h-6 cursor-pointer transform-gpu transition hover:rotate-90 hover:text-indigo-600 focus:text-indigo-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @if($coll->services->count() > 0)
                        <tr>
                            <td class="px-6 whitespace-no-wrap text-sm leading-5 text-gray-500" colspan="7">
                                Extra Services:
                            </td>
                        </tr>
                        @foreach($coll->services as $serv)
                        <tr>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200">
                                <!-- <div class="text-sm leading-5 text-gray-500">{{$serv->id}}</div> -->
                            </td>
                            <td class="px-6 whitespace-no-wrap border-b border-gray-200" colspan="3">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                    {{$serv->name}}
                                </div>
                            </td>
                            <td class="whitespace-no-wrap border-b border-gray-200" colspan="3">
                                <div class="text-sm leading-5 text-gray-500">
                                    {{$serv->price}} S.P
                                </div>
                            </td>
                        </tr> 
                        @endforeach
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // voting click
    document.addEventListener('click', (e) => {
        if(e.target.classList.contains('star-cont') || checkParents(e.target, 'star-cont')) 
            handleVoting(e.target);
    });

    function handleVoting(elem){
        const parent_star = checkParents(elem, 'star-cont');
        parent_star.classList.add('text-yellow-500');
        parent_star.classList.remove('text-gray-500');
        let next = parent_star.nextElementSibling;
        let prev = parent_star.previousElementSibling;
        while(next!=null || prev!=null){
            if(next!=null){
                next.classList.remove('text-yellow-500');
                next.classList.add('text-gray-500');
                next = next.nextElementSibling;
            }
            if(prev!=null){ 
                prev.classList.add('text-yellow-500');
                prev.classList.remove('text-gray-500');
                prev = prev.previousElementSibling;
            } 
        }
        var bkg_id = parent_star.parentElement.dataset.bkgid;
        var vote_value = parent_star.dataset.starval;
        $.ajax({
            url: '{{URL::current()}}',
            type: 'post',
            data: '&value=' + vote_value + "&bkg_id=" + bkg_id ,
            success: function(data){
                console.log(data);                           
            }
        });
    }
</script>
</x-userProfile>
