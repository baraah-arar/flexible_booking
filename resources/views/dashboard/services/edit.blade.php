<x-layoutdashboard>
    <div class=" bg-cover border-t-2  h-full" style="background-image: url('https://www.mexatk.com/wp-content/uploads/2019/01/%D8%AA%D8%B5%D9%85%D9%8A%D9%85%D8%A7%D8%AA-%D9%85%D9%83%D8%AA%D8%A8-%D9%85%D8%AE%D8%AA%D9%84%D9%81%D8%A9-2.jpg');">
        <div class="content px-8 py-2">
            <div class="body mt-20 mx-8">
                <div class="md:flex items-top justify-between">
                    <div class="w-full items-top md:w-1/2 my-20 mr-auto" style="text-shadow: 0 20px 50px hsla(0,0%,0%,8);">
                        <h1 class="text-4xl font-bold text-black tracking-wide">SERVICE

                        </h1>
                        <p class="text-black mb-8">
                            On this page, you can add any service so that it can be reserved for customers.
                        </p>
                        <span class="text-black ">Click Here To Return <a href="{{ route('dashboard.services_index')}}" class="text-gray-900 text-lg ml-2 font-bold">Services</a></span>
                    </div>
                    <div class="w-full md:max-w-md mt-6">
                        <div class="card bg-gray-100 shadow-md rounded-lg px-4 py-4 mb-6 ">
                            <form action="{{ route('services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="flex items-center justify-center">
                                    <h2 class="text-2xl font-bold tracking-wide">
                                        Edit Service
                                    </h2>
                                </div>
                                  <label for="name" class="inline-block  text-gray-500">Name:</label>
                                  <input  id="name" name="name" type="text" value="{{ $service->name }}" value="{{ old('name')}}" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-3 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none"/>
                                     @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                     @enderror

                                  <label for="status" class="inline-block  text-gray-500">Status</label>
                                  <select id="status" name="status" value="{{ $service->status }}" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-3 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none">
                                      <option value="available"  {{ ($service->status=="available")? "selected" : "" }} {{ old('status') == "available" ? 'selected' : '' }} >Available</option>
                                      <option value="unavailable" {{ ($service->status=="unavailable")? "selected" : "" }} {{ old('status') == "unavailable" ? 'selected' : '' }} >Unavailable</option>
                                  </select>

                                  <label for="price"  class="inline-block text-gray-500">Price:</label>
                                  <input id="price" name="price" type="number" value="{{ $service->price }}" value="{{ old('price')}}" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-3 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none"/>
                                       @error('price')
                                         <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                       @enderror

                                  <label for="description"  class="inline-block text-gray-500">Description:</label>
                                  <textarea id="description" name="description"  type="textarea" class="rounded px-4 w-full py-1 bg-gray-200  border border-gray-400 mb-3 text-gray-700 placeholder-gray-700 focus:bg-white focus:outline-none">{{ $service->description }} {{old('description')}}</textarea>
                                   @error('description')
                                     <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                   @enderror

                                   <div class="flex w-full justify-center mt-1">
                                        <div class="m-1 w-full">
                                            <label class="inline-block mb-1 text-gray-500">File Upload</label>
                                            <div class="flex items-center justify-center w-full">
                                                <label
                                                    class="flex flex-col w-full border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                                    <div class="flex flex-col items-left w-full justify-center pt-0">
                                                        <input accept="image/*" type='file' id="imgInp"  name="image" class="mt-0"/>
                                                       <div class="flex ">
                                                        <img id="blah" src="#" alt="click on above button to set new image" class="mx-6" width="150" height="100" />
                                                        <img src="{{asset('storage/' . $service->image)}}" width="150" height="100"  alt="old image">
                                                    </div>
                                                    </div>
                                                    @error('image')
                                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                                 @enderror
                                                </label>
                                            </div>
                                        </div>
                                </div>

                              <div class=" px-2 py-3 bg-gray-100 text-right sm:px-6 flex justify-between">
                                    <a href="{{ route('dashboard.services_index')}}" class="inline-flex w-20 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Cancel
                                      </a>
                                   <button type="submit" class="  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                     Update
                                     </button>

                               </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        blah.src = URL.createObjectURL(file)
      }
    }
    </script>

</x-layoutdashboard>
