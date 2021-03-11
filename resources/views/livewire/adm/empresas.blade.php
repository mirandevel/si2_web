<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="mb-5">
                <h2 class="text-2xl font-semibold leading-tight">Empresas</h2>
            </div>
            <div class="relative flex justify-center my-5">
                <x-buscador wire:model="nombreDeCategoriaABuscar">
                </x-buscador >
            </div>
            <div class="grid grid-cols-5 gap-10">
                @foreach($empresas as $empresa)
                    <div class="border-2 border-paleta-4 rounded relative">
                        <div class="absolute top-0 right-0 ...">
                            <div class="ml-3 relative">


                                <x-jet-dropdown align="right" width="60">
                                    <x-slot name="trigger">
                                <span class="inline-flex rounded">
                                    <button type="button"
                                            class="inline-flex items-center px-1 py-1 border border-transparent font-medium rounded text-gray-500 bg-gray-300 hover:bg-gray-500 hover:text-gray-500 focus:outline-none focus:bg-gray-400 active:bg-gray-500 transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path
                                            d="M4 6H20V8H4zM4 11H20V13H4zM4 16H20V18H4z"></path></svg>
                                    </button>
                                </span>
                                    </x-slot>

                                    <x-slot name="content">
                                       {{-- <button class="w-full block px-4 text-left py-1"
                                                wire:click="cargarDatos({{ $empresa->id }})"
                                onclick="mostrarModalSee()">
                                <span class="mr-2">Ver</span>
                                </button>--}}
                                <div class="border-t border-gray-200"></div>
                                <button class="w-full block px-4 text-left py-1"
                                        wire:click="cargarDatosDelFormularioEdit({{ $empresa->id }}, '{{ $empresa->nombre }}','{{ $empresa->nit}}')"
                                        onclick="mostrarModalEdit()">
                                    <span class="mr-2">Editar</span>
                                </button>
                                <div class="border-t border-gray-200"></div>
                                <button class="w-full block px-4 text-left py-1"
                                        wire:click="$set('idDeCategoriaSeleccionada', {{ $empresa->id }})"
                                        onclick="mostrarModalDelete()">
                                    <span class="mr-2">Eliminar</span>
                                </button>
                                </x-slot>
                                </x-jet-dropdown>

                            </div>
                        </div>
                        <img class="border-b-2 border-paleta-4" src="{{ asset('storage/'.$empresa->image_url) }}" >
                        <div class="text-center uppercase">
                        <p class="text-paleta-4 text-lg">Nombre: {{$empresa->nombre}}</p>
                        <p class="text-black text-lg ">NIT: {{$empresa->nit}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="px-5 py-5 bg-white border-t items-center xs:justify-between">
                {{ $empresas->links() }}
            </div>
        </div>
    </div>

    <!-- modal para crear -->
    <div wire:ignore.self class="modal-create h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Crear Marca</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalCreate()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="flex place-content-center">
                <div class="w-full max-w-lg">
                    <div class="p-5 pb-6">
                        <div class="flex flex-wrap">
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                       for="grid-email">
                                    Nombre
                                </label>
                                <input type="text" wire:model="nombre" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>
                        @error('nombre')
                        <span class="error">{{ $message }}</span>
                        <p>error</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-end p-1 text-center bg-gray-200">
                        <div class="m-3">
                            <button wire:click="storeCategoria" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center disabled:opacity-50" @if (!$errors->has('nombre') && $nombre != '')  onclick="ocultarModalCreate()" @else disabled @endif>
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

    <!-- modal para editar -->
    <div wire:ignore.self class="modal-edit h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Editar Marca</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalEdit()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="flex place-content-center">
                <div class="w-full max-w-lg">
                    <div class="p-5 pb-6">
                        <div class="flex flex-wrap">
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                       for="grid-email">
                                    Nombre
                                </label>
                                <input type="text" value="{{ $nombre }}" wire:model="nombre" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                            <div class="w-full px-3">
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                       for="grid-email">
                                    nit
                                </label>
                                <input type="text" value="{{ $nit }}" wire:model="nit" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            </div>
                        </div>
                        @error('nombre')
                        <span class="error">{{ $message }}</span>
                        <p>error</p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-end p-1 text-center bg-gray-200">
                        <div class="m-3">
                            <button wire:click="editCategoria" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center disabled:opacity-50" @if (!$errors->has('nombre') && $nombre != '')  onclick="ocultarModalEdit()" @else disabled @endif>
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

    <!-- modal para eliminar -->
    <div wire:ignore.self class="modal-delete h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Eliminar Marca</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalDelete()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                Está seguro que desea eliminar esta marca?
            </div>
            <div class="flex justify-end items-center w-100 border-t p-1">
                <div class="m-3">
                    <button wire:click="resetarValores()" onclick="ocultarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                        <span class="mr-2">Cancelar</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                            <path fill="currentcolor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                        </svg>
                    </button>
                </div>
                <div class="m-3">
                    <button wire:click="eliminarCategoria" onclick="ocultarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                        <span class="mr-2">Aceptar</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                            <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

@push('modals')
        <script>
            const modalCreate = document.querySelector('.modal-create');
            const modalEdit = document.querySelector('.modal-edit');
            const modalDelete = document.querySelector('.modal-delete');

            // const showModalCreate = document.querySelectorAll('.show-create');
            // const showModalSee = document.querySelectorAll('.show-see');
            // const showModalEdit = document.querySelectorAll('.show-edit');

            // const closeModalCreate = document.querySelectorAll('.close-create');
            // const closeModalSee = document.querySelectorAll('.close-see');
            // const closeModalEdit = document.querySelectorAll('.close-edit');
            // const closeModalDelete = document.querySelectorAll('.close-delete');

            //para mostrar los modales
            function mostrarModalCreate(){
                modalCreate.classList.remove('hidden')
            }

            function mostrarModalDelete(){
                modalDelete.classList.remove('hidden')
            }

            function mostrarModalEdit(){
                modalEdit.classList.remove('hidden')
            }

            //para ocultar los modales
            function ocultarModalCreate(){
                modalCreate.classList.add('hidden')
            }

            function ocultarModalDelete(){
                modalDelete.classList.add('hidden')
            }

            function ocultarModalEdit(){
                modalEdit.classList.add('hidden')
            }
        </script>
    @endpush

</div>
