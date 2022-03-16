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
              <div class="flex-col">
              @can('create', \App\Models\UserProfile::class)
                <div class= "m-2 ">
                    <a href="{{ route('users.create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                          </svg>
                         Add Person
                    </a>
                </div>
              @endcan
              <div class="flex justify-start m-2">
                <form method="GET" action="{{URL::current()}}" class="mb-3 w-96 flex">
                    <select name="status"
                            class="filter-select appearance-none block w-full px-3  py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select">
                        <option disabled selected>Select status to filter users</option>
                        <option value="all" {{request('status') == 'all'? 'selected' : ''}}>all</option>
                        <option value="block" {{request('status') == 'block'? 'selected' : ''}}>block
                        </option>
                        <option value="active" {{request('status') == 'Complaint'? 'selected' : ''}}>active</option>
                    </select>
                    <input type="submit" value="Filter"
                           class="text-base px-2 cursor-pointer text-white rounded-sm h-11 -mx-2 font-medium bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                </form>
              </div>
              </div>
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        User_ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                     Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                     Phone
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Role
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                     Status
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Show</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Delete</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">

                    {{-- @php
                    $i=0;
                    @endphp --}}
                  @foreach ($users as $item)
                     <tr>
                         {{-- <th scope="row">{{++$i}}</th> --}}
                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->id}}
                                </div>
                              </div>
                            </div>
                          </td>                         <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 h-10 w-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke=" rgb(129 140 248)">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $item->f_name}}
                                    {{ $item->l_name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $item->email}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                    {{ $item->phone}}
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                <div class="text-sm text-gray-500">
                                  @if($item->role==2)
                                    manager
                                  @elseif($item->role==3)
                                    Employee
                                  @else
                                    customer
                                  @endif

                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="ml-4">
                                 @if($item->status=="active")
                                  <div class=" bg-green-100 text-green-800 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
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
                            <a href="{{ route('users.show',$item->id)}}" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Show</a>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          @can('update', $item)
                            <a href="{{ route('users.edit',$item->id)}}" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</a>
                          @endcan
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                          @can('delete', $item)
                            <form data-route="{{ route('users.destroy',$item->id)}}" method="post" class="delete-form text-indigo-600 hover:text-indigo-900" >
                                 @csrf
                                 @method('DELETE')
                            <button type="submit"  data-role="{{$item->status == 'block'? 'Unblock' : 'Block'}}" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white {{$item->status == 'block'? 'bg-gray-600 hover:bg-gray-700' : 'bg-red-600 hover:bg-red-700'}} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{$item->status == 'block'? 'Unblock' : 'Block'}}
                            </button>
                            </form>
                            @endcan
                          </td>
                         </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type="text/javascript">
        $(document).ready(function() {

          $('.delete-form').on('submit', function(e) {
            e.preventDefault();
            var button = $(this);
            role = e.target.querySelector('button[type="submit"]').dataset.role;
            Swal.fire({
              icon: 'warning',
                title: `Are you sure you want to ${role} this user?`,
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  url: button.data('route'),
                  data: {
                    '_method': 'delete'
                  },
                  success: function (response, textStatus, xhr) {
                    if(response.status === 'failed'){
                      Swal.fire({
                        icon: 'success',
                        title: 'this account is Unblocked',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'Ok'
                    }).then((result) => {
                      window.location='/dashboard/users'
                    });
                    }else
                    Swal.fire({
                        icon: 'success',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                      window.location='/dashboard/users'
                    });
                  }
                });
              }
            });
          })
        });
      </script>

<script>
    setTimeout(()=> document.querySelector('.flash-msg').classList.add('hidden'),3000)
</script>


</x-layoutdashboard>


{{$users->links()}}

