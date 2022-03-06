<x-modal-overlay id="extras-overlay">
    <x-modal-header closeDes=''>{{__('Pick any service you want.')}}</x-modal-header>
    <div class="flex flex-wrap">
    @if($services->count() <= 0)
        <h3>{{__('No Services Available.')}}</h3>
    @else
    @foreach($services as $service)
        <a class="extra_elem w-nm lg:w-full m-2 shadow-lg border-2 border-transparent hover:border-indigo-300 hover:shadow" data-extraId="{{$service->id}}" data-name="{{$service->name}}">
            <div class="flex cursor-pointer items-center justify-between h-full lg:flex-row flex-col p-4">            
                <div class="w-32 h-16 lg:w-48 lg:h-20">
                    <svg class="w-32 h-16 lg:w-48 lg:h-20" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"></path></svg>
                </div>
                <div class="text-sm grow flex flex-col mx-2">
                    <h1 class="font-medium">{{$service->name}}</h1>
                    <p>{{$service->description}}</p>
                </div>
                <div class="self-end font-medium min-w-max">
                    <span>{{__('Price')}}: </span> {{$service->price}} S.P
                </div>
            </div>
        </a>
    @endforeach
    @endif   
        <div class="model-foter flex items-center justify-end w-full mt-4">
            <a class="book_extra_btn order-2 w-48 cursor-pointer inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{__('Book Selected Services')}}
            </a>                     
        </div> 
    </div>
</x-modal-overlay>