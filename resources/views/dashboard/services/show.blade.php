<x-layoutdashboard>

    <div class="flex flex-col justify-center h-screen">
        <div class="relative w-full h-full flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 mx-auto border border-white bg-white">
            <div class="w-full md:w-1/3 bg-white grid place-items-center">
                <img src="{{asset($service->image)}}" alt="" />
           </div>

                <div class="w-full md:w-2/3 rounded overflow-hidden shadow-lg bg-white flex flex-col space-y-2 p-3">
                    <div class="flex h-full   justify-between">
                          <div class=" h-full w-full px-6 pb-2">
                            <div class="px-4 sm:px-6 ">
                                <h2 class="text-4xl mb-4 text-center font-medium text-indigo-700" id="slide-over-title">
                                  {{ $service->name }}
                                </h2>
                              </div>
                            <span class="inline-block rounded-full px-10 py-2 text-sm font-semibold text-gray-700 mr-2 mb-2">Description : {{ $service->description }}</span><br/>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">Status :</span><span class="font-bold text-l">{{ $service->status}}</span><br/>
                            <span class="inline-block rounded-full py-2 text-sm font-semibold px-10 text-gray-700 mb-2">Price :</span><span class="font-bold text-l">{{ $service->price}}</span><span class="text-sm font-semibold">$</span><br/>
                          </div>

                </div>
                <div class="mx-4 my-4 flex justify-between">
                    <a href="{{ route('dashboard.services_index')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Back </a>
                    <a href="{{ route('services.edit',$service->id)}}" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Edit</a>
                  </div>
            </div>
        </div>
        </div>

    </x-layoutdashboard>
