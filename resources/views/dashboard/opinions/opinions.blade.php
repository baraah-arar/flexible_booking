<x-layoutdashboard>

        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <h2 class="text-xl font-semibold text-center text-indigo-600 text-vnet-blue mb-2">Complement & Complaint</h2>
          <div class="flex justify-center items-start my-2">

            <div class="w-full sm:w-10/12 md:w-1/2 my-1">

                <div class="flex justify-center">
                    <div class="mb-3 xl:w-96">
                      <select class="filter-select appearance-none block w-full px-3  py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                          <option selected>Open this select menu</option>
                          <option  value="Complement">Complement</option>
                          <option  value="Complaint">Complaint</option>
                      </select>
                    </div>
                  </div>
                @foreach ($opinions as $item)
              <ul class="flex flex-col">
                <li class="bg-white my-2 opinion-item shadow-lg" x-data="accordion(1)">
                  <h2

                    class="opinion-title flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                  >
                    <span>{{ $item->title}}</span>
                    <svg

                      class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                      viewBox="0 0 20 20"
                    >
                      <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                    </svg>
                  </h2>
                  <div
                    x-ref="tab"

                    class="border-l-2  opinion-body border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                  >
                    <p class="p-3 text-gray-900">
                    {{ $item->body}} </p>
                  </div>
                <div class="flex justify-between">
                    <div class="mx-2 text-sm text-center">
                        {{ $item->type}}
                    </div>
                  <div >
                      <p>
                  By<a href="{{ route('author.opinions',$item->user_id)}}" class="text-indigo-600 text-sm hover:underline hover:text-indigo-800 ml-2">{{ $item->author->f_name}} {{ $item->author->l_name }} </a>
                </p>
                </div>
                  <form data-route="{{ route('opinions.destroy',$item->id)}}" method="post" class="delete-form mx-2 my-2 text-indigo-600 hover:text-indigo-900" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex text-sm w-16 justify-center py-1 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Delete
                    </button>
                 </form>
                 </div>
                </li>

              </ul>
              @endforeach

            </div>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const title_elements=document.querySelectorAll('.opinion-title');
    title_elements.forEach(elem=>{
         elem.addEventListener('click',function(e){
            elem.querySelector('svg').classList.toggle('rotate-180');
            getParents(elem, 'opinion-item').querySelector('.opinion-body').classList.toggle('max-h-0');
        })

    })
    function getParents(elem, elemClass){
                while(elem.parentElement){
                    if(elem.parentElement.classList.contains(`${elemClass}`)) {
                        return elem.parentElement;
                    }
                    elem = elem.parentElement;
                }
            }

</script>

<script type="text/javascript">
    $(document).ready(function() {

      $('.delete-form').on('submit', function(e) {
        e.preventDefault();
        var button = $(this);

        Swal.fire({
          icon: 'warning',
            title: 'Are you sure you want to delete this opinion?',
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
              success:  function (response, textStatus, xhr) {

                Swal.fire({
                    icon: 'success',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: 'Yes'
                }).then((result) => {
                  window.location='/dashboard/opinions'
                });
              }
            });
          }
        });
      })
    });
  </script>
  {{-- <script>
    function showRes() {
     document.getElementById("Complement").style.display = "inline";
      document.getElementById("Complaint").style.display = "none"
      }
    function showEdit() {
     document.getElementById("Complement").style.display = "none";
     document.getElementById("Complaint").style.display = "inline"
    }
</script> --}}
</x-layoutdashboard>
{{$opinions->links()}}
