<div>
<div class="container antialiased font-sans mx-auto px-4 sm:px-8">
    <div class="py-8">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">Categorias</h2>
        </div>
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="flex flex-row mb-1 sm:mb-0">
                <div class="relative">
                    <select wire:model="cantidadDeItemsPorPagina" type="int"
                        class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
            <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                <input placeholder="Buscar" wire:model="nombreDeCategoriaABuscar"
                       class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
            </div>
            <button type="button" onclick="mostrarModalCreate()" class="border bg-white text-gray-800 font-bold rounded-md px-4 ml-1 transition duration-500 ease select-none hover:bg-green-300 focus:outline-none focus:shadow-outline">
                Crear +
            </button>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            @if(count($categorias) > 0)
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Id
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $categoria->id }}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{ $categoria->nombre }}</p>
                                </td>
                                <td class="border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center justify-center">
                                        <div class="m-3">
                                            <button wire:click="cargarDatosDelFormularioEdit({{ $categoria->id }}, '{{ $categoria->nombre }}')" onclick="mostrarModalEdit()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                                                <span class="mr-2">Editar</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                    <path fill="currentcolor" d="M6 2v6h.01L6 8.01 10 12l-4 4 .01.01H6V22h12v-5.99h-.01L18 16l-4-4 4-3.99-.01-.01H18V2H6zm10 14.5V20H8v-3.5l4-4 4 4zm-4-5l-4-4V4h8v3.5l-4 4z"></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="m-3">
                                            <button wire:click="$set('idDeCategoriaSeleccionada', {{ $categoria->id }})" onclick="mostrarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                                                <span class="mr-2">Eliminar</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                    <path fill="currentcolor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 py-5 bg-white border-t items-center xs:justify-between">
                        {{ $categorias->links() }}
                    </div>
                </div>
            @else
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <div class="px-5 py-5 bg-white border-t">
                        No hay resultados...
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

    <!-- modal para crear -->
    <div wire:ignore.self class="modal-create h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Crear Categoría</h3>
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
                <h3 class="font-semibold text-lg">Editar Categoría</h3>
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
                <h3 class="font-semibold text-lg">Eliminar categoría</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalDelete()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                Está seguro que desea eliminar esta categoria?
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
