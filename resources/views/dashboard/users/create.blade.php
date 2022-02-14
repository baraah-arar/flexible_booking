<x-layoutdashboard>

    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
	<div class="relative py-3 sm:max-w-xl sm:mx-auto">
		<div
			class="absolute inset-0 bg-gradient-to-r from-indigo-300 to-indigo-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
		</div>
		<div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
			<div class="max-w-md mx-auto">
				<div>
					<h1 class="text-2xl text-indigo-700 font-semibold">Add Person</h1>
				</div>
				<div class="divide-y divide-gray-200">
                    <form action="{{ route('users.store')}}" method="POST">
                        @csrf

                            <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <div class=" relative col-span-6 sm:col-span-3">
                                <input  id="first-name" name="f_name" type="text" value="{{ old('f_name')}}" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" />
                                <label for="f_name" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">First Name :</label>
                                @error('f_name')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                        </div>
                        <div class="relative col-span-6 sm:col-span-3">
                             <input  id="last-name" name="l_name" type="text" value="{{ old('l_name')}}" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"  />
                                <label for="l_name" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Last Name</label>
                             @error('l_name')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            </div>
                        <div class="relative col-span-6 sm:col-span-3">
                                <input  id="phone" name="phone" type="text" value="{{ old('phone')}}" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600" />
                                <label for="phone" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Phone</label>
                             @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            </div>
                        <div class="relative col-span-6 sm:col-span-4">
                                <input  id="email-address" name="email" type="text" value="{{ old('email')}}" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"  />
                                <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            </div>
                        <div class="relative col-span-6 sm:col-span-4">
                                <input  id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:borer-rose-600"  />
                                <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                            </div>
                        <div class="col-span-6 flex sm:col-span-6">
                            <p class=" dark:text-gray-400 ">
                                Role:
                            </p>
                            <div class="flex col-span-2 mx-6 items-center">
                              <input id="role" value="2" {{ old('role')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}  name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-indigo-300">
                              <label for="role" class="ml-3 block text-sm ">
                                Manager
                              </label>
                            </div>
                            <div class="flex col-span-2 mx-6 items-center">
                              <input id="role" value="3" {{ old('role')=="3" ? 'checked='.'"'.'checked'.'"' : '' }}  name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-indigo-300">
                              <label for="role" class="ml-3 block text-sm ">
                                Employee
                              </label>
                            </div>
                            <div class="flex col-span-2 items-center">
                             <input id="role" value="1" {{ old('role')=="1" ? 'checked='.'"'.'checked'.'"' : '' }} name="role" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-indigo-300">
                             <label for="role" class="ml-3 block text-sm ">
                                Customer
                             </label>
                            </div>
                        </div>
                        <div class="relative col-span-6 sm:col-span-3">
                            @error('role')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                       </div>
                        <div class="col-span-6 sm:col-span-6">
                            <label for="Status" class="block ">Status</label>
                            <select id="Status" name="status" class="mt-1 block w-full h-10 rounded py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 ">

                            <option value="active" {{ old('status') == "active" ? 'selected' : '' }} >Active</option>
                            <option value="dactive" {{ old('status') == "dactive" ? 'selected' : '' }}>Dactive</option>
                            <option value="block" {{ old('status') == "block" ? 'selected' : '' }}>Block</option>
                            </select>
                        </div>

					 </div>

                            </div>
                            <div class=" px-2 py-3 bg-white text-right sm:px-6 flex justify-between">
                                <a href="{{ route('users.create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                   Cancel
                                 </a>
                               <button type="submit" class="  inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                 Submit
                                 </button>
                                 <a href="{{ route('dashboard.users')}}" class="inline-flex w-20 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Back
                                  </a>
                           </div>
                    </form>

				</div>
			</div>
		</div>
	</div>
</div>


 </x-layoutdashboard>
