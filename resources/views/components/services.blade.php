<x-layout>
<div class="flex md:flex-row flex-col md:space-x-4 md:space-y-0 space-y-8 justify-between items-center w-full my-8">
    <x-page-title>Places</x-page-title>
    <div class="flex space-x-4">
        <button class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Individual</button>
        <button class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Privte office</button>
        <button class="border-2 border-gray-300 text-sm font-medium text-gray-500 px-2 py-2 hover:text-gray-600 hover:border-gray-200 hover:bg-white">Meeting room</button>
    </div>
</div>
<div class="hor-card services-card my-8 md:grid grid-cols-1 md:grid-cols-3">
                            <div class="img-sec w-full h-full">
                                <div style="background-image:url('/images/indv.svg')" class="row-start-1 col-start-1 col-span-2 bg-cover bg-no-repeat bg-center h-full w-full"></div>
                                <!-- <div style="background-image:url('/images/worker.png')" class="row-start-1 mt-10 col-start-2 col-span-2 bg-contain bg-no-repeat bg-center h-32 w-auto"></div> -->
                            </div>
                            <div class="body-sec my-8 flex flex-col bg-gray-200 shadow p-8 opacity-80">
                                <div class="card-body my-4 flex flex-col">
                                    <div class="border-b-2 border-gray-600 pb-8">
                                        <div class="flex justify-between space-x-2 items-center">
                                            <h4 class="text-2xl font-medium text-gray-900 dark:text-white">Shared Spaces</h4>
                                            <span class="text-base self-end text-indigo-600 text-base font-medium">Individual</span>
                                        </div>
                                        <p class="text-base mt-6 text-gray-900 dark:text-gray-300 sm:text-lg md:text-lg">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus magni vero ab voluptatum unde! Necessitatibus, quisquam. Id saepe optio doloremque? Suscipit magnam est veritatis veniam eaque dolore recusandae ducimus velit?</p>
                                    </div>
                                    <div class="flex space-x-4 mt-8 text-gray-900 text-base text-lg font-medium">
                                        <span>Price:</span><span>40LS <span class="text-gray-700">/month</span></span>
                                    </div>
                                    <div class="md:self-center w-full flex flex-wrap justify-center mt-8">
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Hours</span>
                                            <span class="text-sm text-gray-900 text-center">recurring payment</span>
                                        </a>
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Weekly</span>
                                            <span class="text-sm text-gray-900 text-center">billed annually</span>
                                        </a>
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Monthly</span>
                                            <span class="text-sm text-gray-900 text-center">recurring payment</span>
                                        </a>
                                        <a href="" class="w-2/5 flex flex-col m-2 items-center justify-center md:py-4 md:text-lg md:px-10 border-2 border-gray-900 text-gray-900 font-medium py-3 px-8">
                                            <span>Annual</span>
                                            <span class="text-sm text-gray-900 text-center">billed annually</span>
                                        </a>
                                    </div>
                                </div>
                                <a href="/services/book-service" class="mt-8 self-end py-2 text-base px-6 text-white font-medium bg-indigo-600 hover:bg-indigo-700">Book now</a>
                            </div>
                        </div>

</x-layout>