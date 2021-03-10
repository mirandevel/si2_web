<div class="space-y-5 items-center p-10">
    <div class="flex justify-center">
        @if($roles==3)
            <a href="{{route('adm.dashboard')}}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Acceder como Administrador del sitio</a>
        @endif
            <form class="ml-5" method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="no-underline hover:underline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </a>
            </form>
    </div>

    <x-modal :id="0" type="create" >
        <x-slot name="title">
            Nueva Empresa
        </x-slot>
        @livewire('empresa.crear')
    </x-modal>


    <!-- Button (blue), duh! -->

    <p class="text-center font-bold">O</p>

    <h1 class="text-center text-xl font-bold">Gestionar empresas</h1>
    <div class="flex justify-center" x-data="{}"
         @click="$dispatch('{{0}}')">
        <x-jet-button>
           Añadir
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 style="fill:rgb(255,255,255);transform:;-ms-filter:">
                <path d="M13 7L11 7 11 11 7 11 7 13 11 13 11 17 13 17 13 13 17 13 17 11 13 11z"></path>
                <path d="M12,2C6.486,2,2,6.486,2,12s4.486,10,10,10c5.514,0,10-4.486,10-10S17.514,2,12,2z M12,20c-4.411,0-8-3.589-8-8 s3.589-8,8-8s8,3.589,8,8S16.411,20,12,20z">
                </path></svg>
        </x-jet-button>
    </div>
    <div class="grid grid-cols-3 gap-4 place-items-center">
        @foreach($empresas as $empresa)
            <x-start-card :empresa="$empresa->nombre">

                <img src="{{ asset('storage/'.$empresa->image_url) }}" alt="" title="" />
                <p class="font-bold text-xl text-center">{{$empresa->nombre}}</p>
            </x-start-card>
        @endforeach
    </div>
</div>
