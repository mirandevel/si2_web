<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Marcas</h2>
            </div>
            <div class="relative flex justify-center">
                <x-buscador wire:model="nombreDeMarcaABuscar">
                </x-buscador >
                <div class="absolute right-0">
                    <x-jet-button type="button" onclick="mostrarModalCreate()">
                        Crear +
                    </x-jet-button>
                </div>
            </div>

            <div class="flex justify-center my-5">
                <div class="flex flex-col">
                    <x-jet-label for="cantidad" class="text-black text-base text-center" value="{{ __('Cantidad') }}" />
                    <select wire:model="cantidadDeItemsPorPagina" type="int"
                            id="cantidad"
                            class="appearance-none h-full rounded border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-10">
                @foreach($marcas as $marca)
                    <div class="border-2 border-paleta-4  p-5 rounded bg-white">
                        <p class="text-black text-center text-2xl">{{$marca->nombre}}</p>
                        <div class="flex justify-between pt-5">
                            <button type="button" wire:click="$set('idDeMarcaSeleccionada', {{ $marca->id }})" onclick="mostrarModalDelete()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 27">
                                    <path id="Icon_material-delete" data-name="Icon material-delete" d="M9,28.5a3.009,3.009,0,0,0,3,3H24a3.009,3.009,0,0,0,3-3v-18H9ZM28.5,6H23.25l-1.5-1.5h-7.5L12.75,6H7.5V9h21Z" transform="translate(-7.5 -4.5)" fill="#6b7280"/>
                                </svg>

                            </button>
                            <button type="button" wire:click="cargarDatosDelFormularioEdit({{ $marca->id }}, '{{ $marca->nombre }}')" onclick="mostrarModalEdit()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 30 28.682">
                                    <g id="Icon_feather-edit-3" data-name="Icon feather-edit-3" transform="translate(-3 -2.818)">
                                        <path id="Trazado_19" data-name="Trazado 19" d="M18,30H31.5" fill="none" stroke="#6b7280" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                        <path id="Trazado_20" data-name="Trazado 20" d="M24.75,5.25a3.182,3.182,0,0,1,4.5,4.5L10.5,28.5,4.5,30,6,24Z" fill="none" stroke="#6b7280" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                    </g>
                                </svg>
                            </button>
                            <button type="button" wire:click="cargarDatosParaMostrar({{ $marca->id }}, '{{ $marca->nombre }}')" onclick="mostrarModalShow()" class="hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" viewBox="0 0 40.5 27">
                                    <path id="Icon_awesome-eye" data-name="Icon awesome-eye" d="M40.255,16.973A22.552,22.552,0,0,0,20.25,4.5,22.555,22.555,0,0,0,.245,16.974a2.275,2.275,0,0,0,0,2.052A22.552,22.552,0,0,0,20.25,31.5,22.555,22.555,0,0,0,40.255,19.026,2.275,2.275,0,0,0,40.255,16.973ZM20.25,28.125A10.125,10.125,0,1,1,30.375,18,10.125,10.125,0,0,1,20.25,28.125Zm0-16.875a6.7,6.7,0,0,0-1.78.266,3.364,3.364,0,0,1-4.7,4.7,6.735,6.735,0,1,0,6.484-4.97Z" transform="translate(0 -4.5)" fill="#6b7280"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="px-5 py-5 mt-8 border-t items-center xs:justify-between">
                {{ $marcas->links() }}
            </div>
            {{-- <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                 @if(count($marcas) > 0)
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
                             @foreach($marcas as $marca)
                                 <tr>
                                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                         <p class="text-gray-900 text-center whitespace-no-wrap">{{ $marca->id }}</p>
                                     </td>
                                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                         <p class="text-gray-900 text-center whitespace-no-wrap">{{ $marca->nombre }}</p>
                                     </td>
                                     <td class="border-b border-gray-200 bg-white text-sm">
                                         <div class="flex items-center justify-center">
                                             <div class="m-3">
                                                 <button wire:click="cargarDatosDelFormularioEdit({{ $marca->id }}, '{{ $marca->nombre }}')" onclick="mostrarModalEdit()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                                                     <span class="mr-2">Editar</span>
                                                     <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                         <path fill="currentcolor" d="M6 2v6h.01L6 8.01 10 12l-4 4 .01.01H6V22h12v-5.99h-.01L18 16l-4-4 4-3.99-.01-.01H18V2H6zm10 14.5V20H8v-3.5l4-4 4 4zm-4-5l-4-4V4h8v3.5l-4 4z"></path>
                                                     </svg>
                                                 </button>
                                             </div>

                                             <div class="m-3">
                                                 <button wire:click="$set('idDeCategoriaSeleccionada', {{ $marca->id }})" onclick="mostrarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
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
                             {{ $marcas->links() }}
                         </div>
                     </div>
                 @else
                     <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                         <div class="px-5 py-5 bg-white border-t">
                             No hay resultados...
                         </div>
                     </div>
                 @endif
             </div>--}}
        </div>
    </div>

    <!-- modal para ver -->
    <div wire:ignore.self class="modal-show h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-11/12">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Productos de la marca {{ $nombre }}</h3>
                <button class="text-black" onclick="ocultarModalShow()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            User
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Rol
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Created at
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($productos != null)
                            @foreach($productos as $producto)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-full h-full rounded-full"
                                                     src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
                                                     alt="" />
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    Vera Carpenter
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">Admin</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            Jan 21, 2020
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden
                                                  class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative">Activo</span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
                    @if($productos != null)
                        {{ $productos->links() }}
                    @endif
                </div>
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
            const modalShow = document.querySelector('.modal-show');
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

            function mostrarModalShow(){
                modalShow.classList.remove('hidden')
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

            function ocultarModalShow(){
                modalShow.classList.add('hidden')
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
