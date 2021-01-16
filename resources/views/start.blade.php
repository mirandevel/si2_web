<x-guest-layout>
    <div class="space-y-5 items-center p-10">
        <div class="flex justify-center">
            <a href="{{route('adm.dashboard')}}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Acceder como Administrador del sitio</a>
        </div>
        <p class="text-center font-bold">O</p>
        <h1 class="text-center text-xl font-bold">Gestionar empresas</h1>
        <div class="grid grid-cols-3 gap-4 place-items-center">
            <x-start-card/>
            <x-start-card/>
            <x-start-card/>
        </div>
    </div>
</x-guest-layout>
