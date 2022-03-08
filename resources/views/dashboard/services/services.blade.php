<x-layoutdashboard>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @can('create', \App\Models\Service::class)
    <div class= "m-2 ">
        <a href="{{ route('services.create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
              </svg>
             Add Service
        </a>
    </div>
    @endcan
<body class="antialiased bg-gray-200 text-gray-900 font-sans p-6">
    <div class="container mx-auto">
      <div class="flex flex-wrap -mx-4">
        {{-- @php
        $i=0;
        @endphp --}}
        @foreach ($services as $item)
        <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4">
            {{-- <div class="hidden">
                {{++$i}}
             </div> --}}
          <a href="{{ route('services.show',$item->id)}}" class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">

            <div class="relative pb-48 overflow-hidden">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{asset($item->image)}}" alt="">
          </div>
          <div class="p-4">
            <h2 class="mt-2 mb-2  font-bold">{{ $item->name}}</h2>
            <p class="text-sm">{{ $item->description}}</p>
            <div class="mt-8 flex items-center">
              <span class="text-sm font-semibold">Status :</span>&nbsp;<span class="font-bold text-l">{{ $item->status}}</span>
            </div>
            <div class="mt-2 flex items-center">
              <span class="text-sm font-semibold">Price :</span>&nbsp;<span class="font-bold text-l">{{ $item->price}}</span>&nbsp;<span class="text-sm font-semibold">$</span>
            </div>
          </div>
          </a>
            <div class="mx-4 my-4 flex justify-between">
            <a href="{{ route('services.edit',$item->id)}}" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</a>
            @can('delete', $item)
            <form data-route="{{ route('services.destroy',$item->id)}}" method="post" class="delete-form text-indigo-600 hover:text-indigo-900" >
                @csrf
                @method('DELETE', $item)
                <button type="submit" class="inline-flex w-16 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Delete
                </button>
            </form>
            @endcan
         </div>


        </div>
        @endforeach

      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        $('.delete-form').on('submit', function(e) {
          e.preventDefault();
          var button = $(this);

          Swal.fire({
            icon: 'warning',
              title: "Are you sure you want to delete this service, if there are pending booking this service will be unavailable and it's bookings will be canceled ?",
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
                  if(response.status === true)
                  {Swal.fire({
                      icon: 'success',
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: 'Yes'
                  }).then((result) => {
                    // window.location='/dashboard/services'
                    console.log(response.data);
                  });}
                  else if(response.status === 'updated'){
                    Swal.fire({
                      icon: 'warning',
                      title: "can't delete this service, this service is unavailable now and all of it's pending bookings canceled .",
                      showDenyButton: false,
                      showCancelButton: false,
                      confirmButtonText: 'Ok'
                    }).then((result) => {
                      location.reload();
                  }); }
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
  </body>
</x-layoutdashboard>

{{-- {{$places->links()}} --}}
