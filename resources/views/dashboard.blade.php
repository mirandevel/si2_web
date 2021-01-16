<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>
            <div x-data="{ open: false }">
                <button @click="open = true">Abrir Desplegable</button>

                <div
                    x-show="open"
                    @click.away="open = false"
                >
                    <x-menu >

                    </x-menu>
                </div>
            </div>

</x-app-layout>
