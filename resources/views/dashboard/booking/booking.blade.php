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
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Place Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Services
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Start Date
                    </th>
                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        End Date
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Payment Plan
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Cost
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Confirm</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    @php
                    $i=0;
                    @endphp
                  @foreach ($bookings as $item)
                     <tr>
                         <th scope="row">{{++$i}}</th>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke=" rgb(129 140 248)">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $item->User->f_name}}
                                    {{ $item->User->l_name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $item->User->email}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->User->phone}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->place->title}}
                                </div>
                              </div>
                            </div>
                          </td>
                         <td class="px-6 py-4 whitespace-nowrap">
                           <div class="flex items-center">
                              <div class="ml-4">
                                @foreach ($item->services as $services)
                                  <div class="text-sm text-gray-500">
                                    {{ $services->name}}
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </td>

                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->start_date}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->end_date}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->payment_plan}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->cost}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                 @if($item->status=="confirmed")
                                  <div class=" bg-green-100 text-green-800 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ucwords($item->status) }}
                                  </div>
                                  @elseif($item->status=="bending")
                                  <div class=" bg-red-100 text-red-400 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ucwords($item->status) }}
                                  </div>
                                  @else
                                  <div class=" bg-gray-100 text-gray-400 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                    {{ucwords($item->status) }}
                                  </div>
                                  @endif
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="inline-flex w-16 justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Confirm</a>
                          </td>
                         </tr>
                    @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>


<script>
    setTimeout(()=> document.querySelector('.flash-msg').classList.add('hidden'),3000)
</script>


</x-layoutdashboard>


{{$bookings->links()}}

