<x-userProfile>
    <div class='flex justify-between mb-2'>
    @if(!isset($reservations))
    <h1 class="text-xl font-bold text-gray-700"> {{__('Page not found')}}</h1>
    @else    
    <h1 class="text-xl font-bold text-gray-900"> {{__('Reservation Details')}}</h1>
    <h2 class="rounded-lg px-2 font-medium {{$reservations->status == 'canceled'? 'bg-red-200 ' : ''}}
                {{$reservations->status == 'out_of_date'? 'bg-gray-200 ' : ''}}
                {{$reservations->status == 'pending'? 'bg-yellow-200 ' : ''}}
                {{$reservations->status == 'confirmed'? 'bg-green-200 ' : ''}}">
        {{__($reservations->status)}}
    </h2>
    </div>
    <div class="{{$reservations->status == 'canceled' || $reservations->status == 'outofdate'? 'bg-dotted-ver ': ''}} w-full h-full user-resv-card flex flex-col relative" data-status="{{$reservations->status}}">
        <div class="thumbnail w-full h-60 md:h-80 bg-center bg-no-repeat {{$reservations->place->image != null ? 'bg-cover' : 'bg-50%'}}" style="background-image:url('{{$reservations->place->image != null ? asset('storage/' . $reservations->place->image) : '/images/noimage.svg'}}')">
        </div>
        <div class="resv-card-body flex flex-col flex-wrap md:flex-row my-8">
            <div class="flex flex-col w-full flex-grow">
                <h1 class="mb-4 text-base text-lg font-bold">{{$reservations->place->title}}</h1>
                <p class="mb-4">{{$reservations->place->description}}</p>
                <span class="mb-4">{{__('Guests to')}}: {{$reservations->place->capacity}}</span>
                <span class="mb-4">{{__('Price / Hour')}}: {{$reservations->place->price}} S.P</span>
            </div>
            <div class="form-sec flex flex-col w-full flex-grow mt-4">
                <h1 class="text-base text-lg font-bold">{{__('Reservation Time and Cost')}}:</h1>
                <form action="{{URL::current()}}" method="POST" class="confirm_form w-full" data-form-role="confirm_form" data-place-id="{{$reservations->plc_id}}">
                    @csrf
                    <div class="confirm_sections">
                        <div class="flex items-center flex-col">
                            <input type="hidden" value="{{$reservations->place->id}}" name="plc_id">
                                <div class="w-full flex flex-col justify-center items-center">
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="date-from" class="sr-only">from</label>
                                        <label for="date-from" class="p-4 w-1/5">{{__('from')}}</label>
                                        <input type="text" readonly="readonly" value="{{$reservations->start_date}}" name="start_date" id="checkIn" class="{{($reservations->status == 'pending')? 'select_time' : '' }} input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="checkOut" class="sr-only">to</label>
                                        <label for="checkOut" class="p-4 w-1/5">{{__('to')}}</label>
                                        <input type="text" readonly="readonly" value="{{$reservations->end_date}}" name="end_date" id="checkOut" class="{{($reservations->status == 'pending')? 'select_time' : '' }} input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="hoursNum" class="sr-only">{{($reservations->place->plc_type == 'private') ? __('Days Number') : __('Hours Number')}}</label>
                                        <label for="hoursNum" class="p-4 w-1/5">{{($reservations->place->plc_type == 'private') ? __('Days Number') : __('Hours Number')}}</label>
                                        <input type="text" readonly="readonly" value="{{($reservations->place->plc_type == 'private') ? Carbon\Carbon::parse($reservations->end_date)->diffInDays($reservations->start_date) : Carbon\Carbon::parse($reservations->end_date)->diffInHours($reservations->start_date)}}" name="hoursNum" id="hoursNum" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <div class="w-full flex items-center justify-center mx-2">
                                        <label for="cost" class="sr-only">Cost</label>
                                        <label for="cost" class="p-4 w-1/5">{{__('Cost')}}</label>
                                        <input type="text" readonly="readonly" value="{{$reservations->cost}} S.P" name="cost" id="cost" class="input-date-focus appearance-none rounded-none relative block h-10 w-full px-3 py-2 border-b border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                                        <svg class="svg-date-focus w-8 h-10 border-b border-gray-300 text-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path></svg>
                                    </div>
                                </div>
                        </div>
                        @if($reservations->status == 'pending')
                            <div class="flex justify-between items-end mt-2">
                                <a type="submit" value="Update" data-placeid="{{$reservations->place->id}}" class="update_form_btn order-2 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">                    
                                    {{__('Update')}}    
                                </a>
                                <a type="submit" value="cancel" data-placeid="{{$reservations->place->id}}" class="cancel_form_btn cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">                    
                                    {{__('Cancel')}}    
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            @if($reservations->place->plc_type != 'individual')
            <div class="flex flex-col w-full flex-grow my-8">
                <h1 class="text-base text-lg font-bold">{{__('Extra Services')}}: </h1>
                @if($reservations->status == 'active' || $reservations->status == 'pending')
                    <a data-bookid="{{$reservations->id}}" data-booked ="{{$reservations->services}}" class="extraseervices book mt-4 self-end cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-indigo-800 bg-indigo-200 hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" data-bookID=${bookID}>
                        {{__('Add Extras')}}
                    </a>
                @endif
                @foreach($reservations->services as $service)
                    <div class="border-indigo-300 border-b-2 shadow rounded-xl my-2 p-2 flex w-full justify-between items-center">
                        <span class="mx-2">{{$service->name}}</span>
                        <span class="mx-2">{{$service->price}} S.P</span>
                        <span class="mx-2 px-2 rounded-lg  {{$service->pivot->status == 'canceled'? 'bg-gray-200 ' : ''}}
                            {{$service->pivot->status == 'pending'? 'bg-yellow-200 ' : ''}}
                            {{$service->pivot->status == 'confirmed'? 'bg-green-200 ' : ''}}">
                            {{__($service->pivot->status)}}
                        </span>
                        @if($service->pivot->status == 'pending')    
                        <a type="submit" value="cancel" data-service="{{$service->id}}" data-placeid="{{$reservations->place->id}}" class="cancel_extra_btn mx-2 cursor-pointer inline-flex justify-center border border-transparent rounded-full text-2xl font-medium text-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">                    
                            &times;    
                        </a>
                        @endif
                    </div>
                @endforeach                
            </div>
            @endif
        </div>
    
    @endif
    </div>         
</x-userProfile>

<x-calendar action="{{URL::current()}}"></x-calendar>
<x-extras-modal action="{{URL::current()}}" :services="$allServices"></x-extras-modal>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Calendar
    const date_input = document.querySelectorAll('.select_time');
    [...date_input].map(elem => {
        elem.addEventListener('focus', ()=>{
        document.querySelector('#calendar-overlay').classList.remove('hidden');
        document.querySelector('#calendar-overlay').classList.add('flex');
        })
    });
    [...document.querySelectorAll('#calendar-overlay button.close')].map(btnClose => {
        btnClose.addEventListener('click', ()=>{
            document.querySelector('#calendar-overlay').classList.add('hidden');
            document.querySelector('#calendar-overlay').classList.remove('flex');
            // resetCalendarForm();
        });
    });
    document.querySelector('#extras-overlay button.close').addEventListener('click', ()=>{
        document.querySelector('#extras-overlay').classList.add('hidden');
        document.querySelector('#extras-overlay').classList.remove('flex');
    });
    function resetCalendarForm(){
        const calendar_inputs = document.querySelectorAll('.calendar_form form input'); 
        [...calendar_inputs].map(input => {input.value = '';});
    };

    $(".calender_btn").click(function(){
                var url = $(".calendar_form form").attr('action');
                var form_data = $(".calendar_form form").serialize();
                // var plc_id = $(".calender_btn").attr('data-placeid'); 
                console.log(form_data);
                $.ajax({
                    url: url,
                    type: 'put',
                    data: form_data + "&plc_id=" + '{{isset($reservations)? $reservations->plc_id : ''}}' + "&bkg_id=" + '{{isset($reservations)? $reservations->id : ''}}',
                    success: function(data){
                        if(data.status == false)
                            displayErrorMessage(data.message);
                            // console.log(data);
                        // 
                        else
                            // console.log(data); 
                            displayConfirmBookingForm(data);                          
                    },
                    error: function(data){
                        console.log('error');
                    }
                });
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    function displayConfirmBookingForm(data){
        // reset error message
        document.querySelector('.calendar_form  .error_message ').innerText = '';
        // data = '4';
        const form = document.querySelector(`[data-form-role="confirm_form"][data-place-id="${data.data.plc_id}"]`);
        // const formParent = checkParents(form, 'form-sec');
        // console.log(form);
        form.querySelector('input#checkIn').value = data.data.start_date;
        form.querySelector('input#checkOut').value = data.data.end_date;
        form.querySelector('input#hoursNum').value = data.data.numberHours;
        form.querySelector('input#cost').value = `${data.data.cost} S.P`;
        // formParent.classList.remove('hidden');
        console.log(form.querySelector('input#cost'));                
    }

    function displayErrorMessage(msg){
        document.querySelector('.calendar_form  .error_message ').innerText = msg;
    }

    $('.update_form_btn').click(function(){
        // e.preventDefault();
        console.log('{{isset($reservations)? $reservations->id : ''}}');
        var url = $('.confirm_form[data-place-id=' + '{{isset($reservations)? $reservations->plc_id : ''}}' + ']').attr("action");
        var form_data = $('.confirm_form[data-place-id=' + '{{isset($reservations)? $reservations->plc_id : ''}}' + ']').serialize();
        $.ajax({
            url: url,
            type: 'post',
            data: form_data + "&bkg_id=" + '{{isset($reservations)? $reservations->id : ''}}',
            success: function(data){
                   window.location.reload();
                    // displayErrorMessage(data.message);                          
            },
            error: function(data){
                console.log('error');
            }
        });
    })

    $('.cancel_form_btn').click(function(){
        // e.preventDefault();
        console.log('{{isset($reservations)? $reservations->id : ''}}');
        var url = $('.confirm_form[data-place-id=' + '{{isset($reservations)? $reservations->plc_id : ''}}' + ']').attr("action");
        var form_data = $('.confirm_form[data-place-id=' + '{{isset($reservations)? $reservations->plc_id : ''}}' + ']').serialize();
        Swal.fire({
            icon: 'warning',
              title: `{{__('Are you sure you want to cancel your reservation?')}}`,
              showDenyButton: false,
              cancelButtonText: `{{__('Cancel')}}`,
              showCancelButton: true,
              confirmButtonText: `{{__('Yes')}}`
          }).then((result) => {
            if (result.isConfirmed){
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: form_data + "&bkg_id=" + '{{isset($reservations)? $reservations->id : ''}}',
                    success: function(data){
                        window.location.reload();                         
                    },
                    error: function(data){
                        console.log('error');
                    }
                });
            }
        });
    })

    $('.cancel_extra_btn').click(function(){
        // e.preventDefault();
        console.log('{{isset($reservations)? $reservations->id : ''}}');
        var url = $('.confirm_form[data-place-id=' + '{{isset($reservations)? $reservations->plc_id : '' }}' + ']').attr("action");
        // var form_data = $('.confirm_form[data-place-id=' + '{{isset($reservations)? $reservations->plc_id : ''}}' + ']').serialize();
        // console.log(this.dataset.service);
        var srv_id = this.dataset.service;
        Swal.fire({
            icon: 'warning',
              title: `{{__('Are you sure you want to cancel your reservation?')}}`,
              showDenyButton: false,
              showCancelButton: true,
              cancelButtonText: `{{__('Cancel')}}`,
              confirmButtonText: `{{__('Yes')}}`
          }).then((result) => {
            if (result.isConfirmed){
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: "&bkg_id=" + '{{isset($reservations)? $reservations->id : ''}}' + "&srv_id=" + srv_id,
                    success: function(data){
                        window.location.reload();
                            // console.log(data);                          
                    },
                    error: function(data){
                        console.log('error');
                    }
                });
            }
        });
    })

    // Extra Services
    if({{isset($reservations)}}){
    eventExtrasbtn();
    handleSelectExtras();
    }
    function eventExtrasbtn(){
                const btn = document.querySelector('.extraseervices');
                btn.addEventListener('click', () => {
                    defineBookedExras(btn.dataset.booked);
                    document.querySelector('#extras-overlay').classList.toggle('hidden');
                    document.querySelector('#extras-overlay').querySelector('.book_extra_btn').dataset.bookid = btn.dataset.bookid;
                })
            }

            function defineBookedExras(booked){
                var data ={!!isset($reservations)? json_encode($reservations->services, JSON_HEX_TAG) : '' !!};
                data = data.filter((elem,index) => {
                    if(elem.pivot.status !== 'canceled')
                        return elem;
                    });
                var bookedIDs = JSON.parse(JSON.stringify(data));
                if(data.length>0){
                bookedIDs.forEach(service => {                    
                    elem = document.querySelector('#extras-overlay').querySelector(`.extra_elem[data-extraid='${service.id}']`);
                    elem.classList.add('booked');
                    });
                }
                // booked.forEach(item => console.log(item['id']));
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
                if(checkParents(e.target,'extra_elem')) 
                    if(!checkParents(e.target,'extra_elem').classList.contains('booked')) 
                        checkParents(e.target,'extra_elem').classList.toggle('extras-selected');
                console.log('extra click');
            }
    function handleBookExtras(elem){
                console.log('handle');
                const extras_selected = document.querySelectorAll('.extras-selected');
                const noselected_msg  = document.createElement('div');
                if(extras_selected.length<=0){
                    noselected_msg.innerText = `{{__('please select at least one service')}}`;
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
                    url: '{{URL::current()}}',
                    type: 'patch',
                    dataType: 'json',
                    contentType: 'json',
                    data: JSON.stringify(data),
                    contentType: 'application/json; charset=utf-8',
                    success: function(data){
                        console.log(data);
                        document.querySelector('#extras-overlay').classList.add('hidden');
                        window.location.href = '{{URL::current()}}';
                    },
                    error: function(data){
                        console.log('data');
                    }
                });
            }
</script>