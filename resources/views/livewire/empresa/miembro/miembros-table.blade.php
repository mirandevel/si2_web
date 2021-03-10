<div>
    <h2 class="mt-3 text-4xl font-extrabold leading-10 tracking-tight text-left text-gray-900 sm:text-5xl sm:leading-none md:text-6xl sm:text-center">
        Miembros</h2>
    <div class="relative flex justify-center mt-3">
        <div class=" flex w-2/5 border-2 border-paleta-4 rounded bg-white px-5 py-2 ">
            <input wire:model="nombreDeMiembroABuscar" placeholder="Buscar" class="appearance-none w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            <span class="h-full  inset-y-0 left-0 flex items-center pl-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                     style="fill:rgba(36, 55, 98, 1);transform:;-ms-filter:">
                    <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z"></path>
                </svg>
            </span>
        </div>
        <div class="absolute right-0">
            <x-jet-button type="button" onclick="mostrarModalAdd()">
                Añadir miembro +
            </x-jet-button>
        </div>
    </div>
    <div class="flex justify-center my-5">
        <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase" for="grid-state">
                Cantidad de items
            </label>
            <div class="relative">
                <select type="int" wire:model="cantidadDeItemsPorPagina"
                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                </select>
            </div>
        </div>
        <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                Estado
            </label>
            <div class="relative">
                <select type="int" wire:model="estado"
                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
        </div>
    </div>
    <div class="grid justify-items-center grid-cols-3 gap-3 mt-8 mb-8">
        @foreach($miembros as $miembro)
            <div class="w-11/12 my-3 bg-white border-2 border-gray-300 p-6 rounded-md tracking-wide shadow-lg">
                <div id="header" class="flex items-center mb-4">
                    <img alt="avatar" class="w-20 rounded-full border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                    <div id="header-text" class="leading-5 ml-6 sm">
                        <h4 id="name" class="text-xl font-semibold">{{ $miembro->nombre }}</h4>
                        <h5 id="job" class="font-semibold text-blue-600">Inicio : {{ date_create($miembro->fecha_inicio)->format('d-m-Y') }}</h5>
                        @if($miembro->estado === 1)
                            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-green-700 bg-green-100 border border-green-300 ">
                                <div class="text-xs font-normal leading-none max-w-full flex-initial">Activo</div>
                            </div>
                        @else
                            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-pink-700 bg-pink-100 border border-pink-300 ">
                                <div class="text-xs font-normal leading-none max-w-full flex-initial">Inactivo</div>
                            </div>
                        @endif
                    </div>
                </div>
                <p>Correo : {{ $miembro->correo }}</p>
            </div>
        @endforeach
    </div>
    <div class="px-5 py-5 bg-white border-t items-center xs:justify-between">
        {{ $miembros->links() }}
    </div>

    <!-- modal para crear -->
    <div wire:ignore.self class="modal-add h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Añadir miembro</h3>
                <button class="text-black" onclick="ocultarModalAdd()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="flex place-content-center">
                <div class="w-full max-w-lg">
                    <div class="p-5 pb-6">
                        <div class="flex flex-wrap">
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                       for="grid-email">
                                    correo
                                </label>
                                <input wire:model="nombreDeMiembroAnadir" type="text" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>
                        @error('nombreDeMiembroAnadir')
                        <span class="error">{{ $message }}</span>
                        <p>error</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-end p-1 text-center bg-gray-200">
                        <div class="m-3">
                            <button wire:click="storeMiembro" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center disabled:opacity-50" @if (!$errors->has('nombreDeMiembroAnadir') && $nombreDeMiembroAnadir != '')  onclick="ocultarModalAdd()" @else disabled @endif>
                                <span class="mr-2">Guardar</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                    <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <script>
            const modalCreate = document.querySelector('.modal-add');

            //para mostrar los modales
            function mostrarModalAdd(){
                modalCreate.classList.remove('hidden')
            }

            //para ocultar los modales
            function ocultarModalAdd(){
                modalCreate.classList.add('hidden')
            }

            window.addEventListener('respuesta', event => {
                alert(event.detail.valor);
            })
        </script>
    @endpush
</div>
