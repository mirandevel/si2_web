@props([
'id',
'width'=>[
'create'=>'w-3/4',
'update'=>'w-2/5',
'more'=>'w-2/5',
'delete'=>'w-2/5',
],
'type'
])

<div x-data="{ isOpen: false }">
    <!-- this component can be shown/hidden using a `toggle` event  -->
    <div class="absolute z-20 top-0 left-0 flex items-center justify-center w-full h-full"
         style="background-color: rgba(0,0,0,.5);"
         x-show="isOpen" x-on:{{$id}}.window="isOpen = !isOpen" role="alert">
        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto {{$width[$type]}} text-left bg-gray-100 rounded shadow-xl"
             @click.away="isOpen = true">
            <div class="text-center sm:text-left mt-3 ml-4 mr-2">
                <div class="flex justify-between">
                    <h3 class="text-2xl font-bold leading-6 text-gray-900">
                        {{ $title }}
                    </h3>
                    <button @click="isOpen = false">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="35" height="35" viewBox="0 0 24 24"
                             style="fill:rgb(221,48,48);transform:;-ms-filter:">
                            <path
                                d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10s10-4.486,10-10S17.514,2,12,2z M16.207,14.793l-1.414,1.414L12,13.414 l-2.793,2.793l-1.414-1.414L10.586,12L7.793,9.207l1.414-1.414L12,10.586l2.793-2.793l1.414,1.414L13.414,12L16.207,14.793z">
                            </path>
                        </svg>
                    </button>
                </div>
                <div class="h-full flex flex-col sm:justify-center items-center p-6 sm:pt-0 bg-gray-100">
                    <div>
                        <x-slot name="logo">
                            <x-jet-authentication-card-logo />
                        </x-slot>
                    </div>

                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
