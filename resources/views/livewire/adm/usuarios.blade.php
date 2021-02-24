<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Usuarios</h2>
            </div>
            <div class="relative flex justify-center">
                <x-buscador wire:model="nombreDeCategoriaABuscar">
                </x-buscador >
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">

                <div class="inline-block min-w-full shadow rounded-lg border-paleta-4 border-2 overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2 text-center text-xs  text-white uppercase">
                                Nombre de usuario
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2 text-center text-xs  text-white uppercase">
                                Correo
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2  text-center text-xs  text-white uppercase">
                                Activo
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2  text-center text-xs  text-white uppercase">
                                Cuenta verificada
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2  text-center text-xs  text-white uppercase">
                                Acciones
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{$user->name}}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                    <p class="text-gray-900 text-center whitespace-no-wrap">{{$user->email}}</p>
                                </td>
                                <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                    @if($user->activo)
                                        <span class="rounded-full bg-paleta-1 py-2 px-3 text-center">Activo</span>
                                    @else
                                        <span class="rounded-full bg-paleta-7 py-2 px-3 text-center">Deshabilitado</span>
                                    @endif
                                </td>
                                <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                    <div class="flex justify-center">
                                    @if($user->email_verified_at!=null)
                                        <span class="rounded-full bg-paleta-1 py-2 px-3 text-center">Verificada</span>
                                    @else
                                        <span class="rounded-full bg-paleta-7 py-2 px-3 text-center">No Verificada</span>
                                    @endif
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                    <div class="flex items-center justify-center">
                                        <div class="m-3">
                                            <button wire:click="$set('idDeCategoriaSeleccionada', {{ $user->id }})" onclick="mostrarModalEdit()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                                                @if($user->activo)
                                                    <span class="mr-2">Deshabilitar</span>
                                                @else
                                                    <span class="mr-2">Habilitar</span>
                                                @endif
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                    <path fill="currentcolor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                                                </svg>
                                            </button>
                                            <button wire:click="$set('idDeCategoriaSeleccionada', {{ $user->id }})" onclick="mostrarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
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
                        {{ $users->links() }}
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
                <h3 class="font-semibold text-lg">Eliminar Usuario</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalDelete()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                Está seguro que desea eliminar a este usuario?
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

    <div wire:ignore.self class="modal-edit h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Deshabilitar Usuario</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalDelete()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                Está seguro que desea deshabilitar a este usuario?
            </div>
            <div class="flex justify-end items-center w-100 border-t p-1">
                <div class="m-3">
                    <button wire:click="resetarValores()" onclick="ocultarModalEdit()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                        <span class="mr-2">Cancelar</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                            <path fill="currentcolor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                        </svg>
                    </button>
                </div>
                <div class="m-3">
                    <button wire:click="deshabilitar" onclick="ocultarModalEdit()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
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
