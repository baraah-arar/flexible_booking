<x-layout>
<div class="flex md:flex-row flex-col md:space-x-4 md:space-y-0 space-y-8 justify-between items-center h-full w-full my-8">
    <div>
        <h1 class="text-gray-300 font-bold text-4xl md:text-4xl w-32 md:w-48">Individual Booking</h1>
    </div>
    <form action="#" method="POST">
        <div class="">
          <div class="flex items-center flex-col space-x-4">
                <div class="order-2 flex items-center space-x-4">
                    <div class="flex items-center space-y-2">
                        <label for="date-from" class="sr-only">from</label>
                        <label for="date-from" class="">from</label>
                        <input id="date-from" name="date_from" type="datetime-local" value="{{old('date_from')}}" autocomplete="date-from" required class="appearance-none rounded-none relative block h-10 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">                                 
                    </div>
                    <div class="flex items-center space-y-2">
                        <label for="date-to" class="sr-only">to</label>
                        <label for="date-to" class="">to</label>
                        <input id="date-to" name="date_to" type="datetime-local" value="{{old('date_to')}}" autocomplete="date-to" required class="appearance-none rounded-none relative block h-10 w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md bg-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">                                 
                    </div>
                </div>
            <fieldset class="order-1">
              <div class="flex space-x-4">
                <div class="flex items-center">
                  <input id="push-everything" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                  <label for="push-everything" class="ml-3 block text-sm font-medium text-gray-700">
                    Hours
                  </label>
                </div>
                <div class="flex items-center">
                  <input id="push-email" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                  <label for="push-email" class="ml-3 block text-sm font-medium text-gray-700">
                    Weekly
                  </label>
                </div>
                <div class="flex items-center">
                  <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                  <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">
                    Monthly
                  </label>
                </div>
                <div class="flex items-center">
                  <input id="push-nothing" name="push-notifications" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                  <label for="push-nothing" class="ml-3 block text-sm font-medium text-gray-700">
                    Yearlly
                  </label>
                </div>
              </div>
            </fieldset>
          </div>
          <div class=" flex flex-col items-end mt-2">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Check
            </button>
          </div>
        </div>
    </form>
    <!-- <div class="flex space-x-4">
        <button class="border-2 border-gray-300 text-sm text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Hours</button>
        <button class="border-2 border-gray-300 text-sm text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Weekly</button>
        <button class="border-2 border-gray-300 text-sm text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Monthly</button>
        <button class="border-2 border-gray-300 text-sm text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Yearlly</button>
    </div> -->
</div>
<div class="flex items-center justify-center skew-flour shadow-lg my-8 h-4/5 w-4/5">
<div class="invers-skew grid grid-cols-3 items-center justify-center grid-rows-3 mb-8 gap-4 w-4/5">
  <div class="elem-desk notavailable flex justify-center">
    <img src="/images/desk.svg" class="w-24 h-24"/>
  </div>
  <div class="elem-desk available col-start-3 flex justify-center">
   <img src="/images/desk.svg" class="w-24 h-24"/>
  </div>
  <div class="elem-desk authbook col-start-2 flex justify-center">
    <img src="/images/desk.svg" class="w-24 h-24"/>
  </div>
  <div class="elem-desk available col-start-1 flex justify-center">
    <img src="/images/desk.svg" class="w-24 h-24"/>
  </div>
  <div class="elem-desk available col-start-3 flex justify-center">
    <img src="/images/desk.svg" class="w-24 h-24"/>
  </div>
</div>
</div>
</x-layout>