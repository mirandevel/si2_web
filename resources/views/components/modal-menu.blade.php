

<div x-data="{ menu: false }">
    <!-- this component can be shown/hidden using a `toggle` event  -->

    <div
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-x-100"
        x-transition:enter-end="opacity-100 transform translate-x-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform  translate-x-100"
        x-transition:leave-end="opacity-0 transform  -translate-x-100"
        class="absolute z-20 top-0 left-0 flex items-center justify-start w-full h-full"
         style="background-color: rgba(0,0,0,.5);"
         x-show="menu" x-on:menu.window="menu = !menu" role="alert">
        <!-- A basic modal dialog with title, body and one button to close -->
        <div class="h-auto text-left bg-gray-100 rounded shadow-xl"
             @click.away="menu = false">
                {{ $slot }}
        </div>
    </div>
</div>
