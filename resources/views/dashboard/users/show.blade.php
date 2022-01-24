<x-layoutdashboard>

    <div class="flex flex-col justify-center">
        <div class="relative w-full h-full flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 mx-auto border border-white bg-white">
            <div class="w-full md:w-1/3 bg-white grid place-items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBtbP19un6tkqSMuJ4eh9MUAC_AP9kgeyO1x-wVU3FpqvYNrGstrkQUPo3FvoG4l6ZYE0&usqp=CAU" alt="tailwind logo" class="rounded-xl" />
           </div>

                <div class="w-full md:w-2/3 rounded  shadow-lg bg-white flex flex-col space-y-2 p-3">
                    <div class="flex h-full   justify-between">
                          <div class=" h-full w-full px-6 pb-2 overflow-auto">
                            <div class="px-4 sm:px-6 ">
                                <h2 class="text-4xl mb-4 text-center font-medium text-indigo-700" id="slide-over-title">
                                  {{ $user->f_name }} {{ $user->l_name }}
                                </h2>
                              </div>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">User ID:</span><span class="font-bold text-l">{{ $user->id }}</span><br/>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">Phone Number :</span><span class="font-bold text-l">{{ $user->phone }}</span><br/>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">Email :</span><span class="font-bold text-l"> {{ $user->email }}</span><br/>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">Role :</span><span class="font-bold text-l">
                              @if ( ($user->role)=="0")
                                 Manager
                              @else
                                  Customer
                              @endif
                              </span><br/>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">Status :</span><span class="font-bold text-l">  {{ ucwords($user->status )}}</span>
                              <br/>


                            <table class="min-w-full  divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                  <tr>
                                    <th scope="col" class=" py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reservation Number
                                    </th>
                                    <th scope="col" class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Place Type
                                    </th>
                                    <th scope="col" class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Start Date
                                    </th>
                                     <th scope="col" class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        End Date
                                    </th>
                                    <th scope="col" class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                 </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                  @foreach ($user->bookings as $item)
                                     <tr>
                                         <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                              <div class="ml-4">
                                                <div class="text-sm text-gray-500">
                                                    {{ $item->id}}
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                              <div class="ml-4">
                                                <div class="text-sm text-gray-500">
                                                    {{ $item->place->plc_type}}
                                                </div>
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

                                                 @if($item->status=="confirmed")
                                                  <div class=" bg-green-100 text-green-800 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                                                    {{ucwords($item->status) }}
                                                  </div>
                                                  @elseif($item->status=="pending")
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
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>

                        </div>

                </div>
                <div class="mx-4 my-4 flex justify-between">
                    <a href="{{ route('dashboard.users')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Back </a>
                    <a href="{{ route('users.edit',$user->id)}}" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Edit</a>
                  </div>
            </div>
        </div>
        </div>



 </x-layoutdashboard>
