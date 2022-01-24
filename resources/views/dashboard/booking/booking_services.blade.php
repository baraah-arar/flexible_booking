<x-layoutdashboard>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cost
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Confirm</span>
                  </th>
                  </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @php
                    $i=0;
                    $total=0;
                    $unpaid=0;
                    @endphp
                   @foreach ($booking->services as $item)
                     <tr>
                         <th scope="row">{{++$i}}</th>
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{$item->name}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                 @if($item->pivot->status=="confirmed")
                                  <div class=" bg-green-100 text-green-800 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ucwords($item->pivot->status) }}
                                  </div>
                                  @elseif($item->pivot->status=="pending")
                                  <div class=" bg-red-100 text-red-400 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ucwords($item->pivot->status) }}
                                  </div>
                                  @else
                                  <div class=" bg-gray-100 text-gray-400 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ucwords($item->pivot->status) }}
                                  </div>
                                  @endif
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->price}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('dashboard.booking.confirm.services',[$booking->id, $item->id])}}" class="  @if ($item->pivot->status=="pending" && $booking->status=="pending" || $booking->status=="confirmed") {{"active-button bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500"}} @else {{"disable bg-gray-400 cursor-default "}} @endif inline-flex w-16 justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white  focus:outline-none focus:ring-2 focus:ring-offset-2">Confirm</a>
                          </td>
                           @php
                             if ($item->pivot->status !=="canceled")
                               $total += $item->price;

                            if ($item->pivot->status =="pending")
                             $unpaid += $item->price;
                         @endphp
                        </tr>
                    @endforeach

                </tbody>
              </table>

            </div>
            <div class="mx-4 my-4 flex justify-between">
                <a href="{{ route('dashboard.bookings_index')}}" class="inline-flex justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Back </a>
                <p class="text-sm font-semibold"> Unpaid :<span class="font-bold text-xl">  {{ $unpaid }}  </span><span class="text-sm font-semibold">  $ </span></p>
                <p class="text-sm font-semibold"> Total Price :<span class="font-bold text-xl">  {{ $total }} </span><span class="text-sm font-semibold">  $ </span></p>
            </div>
          </div>
        </div>
      </div>


      <script>
        var bt = document.querySelectorAll('.disable');
        [...bt].forEach(element => {
            element.href="";
            element.addEventListener("click",e=>e.preventDefault());
        });
      </script>

<script>
    setTimeout(()=> document.querySelector('.flash-msg').classList.add('hidden'),3000)
</script>


</x-layoutdashboard>



