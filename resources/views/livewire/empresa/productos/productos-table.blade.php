<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Productos</h2>
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
                    <input placeholder="Buscar producto" wire:model="nombreDeProductoABuscar" type="text"
                           class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
                <button type="button" wire:click="cargarDatosPorDefecto()" onclick="mostrarModalCreate()" class="border bg-white text-gray-800 font-bold rounded-md px-4 ml-1 transition duration-500 ease select-none hover:bg-green-300 focus:outline-none focus:shadow-outline">
                    Crear +
                </button>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                @if(count($productos) > 0)
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
                                    Empresa
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Cantidad
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{ $producto->id }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{ $producto->nombre }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{ $producto->empresa }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{ $producto->cantidad }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{ $producto->precio }}</p>
                                    </td>
                                    <td class="border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center justify-center">
                                            <div class="m-3">
                                                <button wire:click="cargarDatos({{ $producto->id }})" onclick="mostrarModalSee()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                                                    <span class="mr-2">Ver</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                        <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="m-3">
                                                <button wire:click="cargarDatos({{ $producto->id }})" onclick="mostrarModalEdit()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-yellow-500 hover:border-yellow-600 hover:bg-yellow-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                                                    <span class="mr-2">Editar</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                                                        <path fill="currentcolor" d="M6 2v6h.01L6 8.01 10 12l-4 4 .01.01H6V22h12v-5.99h-.01L18 16l-4-4 4-3.99-.01-.01H18V2H6zm10 14.5V20H8v-3.5l4-4 4 4zm-4-5l-4-4V4h8v3.5l-4 4z"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <div class="m-3">
                                                <button wire:click="$set('idDeProductoSeleccionado', {{ $producto->id }})" onclick="mostrarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
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
                            {{ $productos->links() }}
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

    <!-- modal para ver -->
    <div wire:ignore.self class="modal-see h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 border border-gray-200 rounded-lg overflow-hidden">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Detalles del Producto</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalSee()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="flex place-content-center">
                <div class="w-full max-w-lg">
                    <div class="p-5 pb-6">
                        <p>nombre: {{ $nombre }}</p>
                        <p>descripcion: {{ $descripcion }}</p>
                        <p>precio: {{ $precio }}</p>
                        <p>calificación: {{ $calificacion }} estrellas</p>
                        <p>cantidad: {{ $cantidad }}</p>
                        @foreach($empresas as $empresa)
                            @if($empresa->id === $empresa_id)
                                <p>empresa: {{ $empresa->nombre }}</p>
                            @endif
                        @endforeach
                        @foreach($marcas as $marca)
                            @if($marca->id === $marca_id)
                                <p>marca: {{ $marca->nombre }}</p>
                            @endif
                        @endforeach
                        @foreach($garantias as $garantia)
                            @if($garantia->id === $garantia_id)
                                <p>garantia: {{ $garantia->tiempo }} meses</p>
                            @endif
                        @endforeach
                    </div>
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
                <h3 class="font-semibold text-lg">Crear Producto</h3>
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
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Precio
                                        </label>
                                        <input type="number" wire:model="precio"
                                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Calificación
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="calificacion"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Cantidad
                                        </label>
                                        <input type="number" wire:model="cantidad"
                                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                </div>
                                <label>
                                    <span class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Descripción</span>
                                    <textarea type="text" wire:model="descripcion"
                                        class="block w-full px-4 py-3 mt-1 mb-3 text-gray-700 bg-gray-200 border border-gray-200 rounded form-textarea focus:outline-none"
                                        rows="2" placeholder=""></textarea>
                                </label>
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Empresa
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="empresa_id"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                                @foreach($empresas as $empresa)
                                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Marca
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="marca_id"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                @foreach($marcas as $marca)
                                                    <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Garantía
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="garantia_id"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                @foreach($garantias as  $garantia)
                                                    <option value="{{ $garantia->id }}">{{ $garantia->tiempo }} meses</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('nombre')
                                        <span class="error">{{ $message }}</span>
                                        <p>error</p>
                                    @enderror
                                    @error('descripcion')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('precio')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('calificacion')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('cantidad')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="flex items-center justify-end p-1 text-center bg-gray-200">
                        <div class="m-3">
                            <button wire:click="storeProducto" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center disabled:opacity-50" @if ($errors->has('nombre') || $errors->has('descripcion') || $errors->has('precio') || $errors->has('cantidad') || empty($nombre) || empty($descripcion) || empty($precio) || empty($cantidad)) disabled @else onclick="ocultarModalCreate()" @endif>
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
                <h3 class="font-semibold text-lg">Editar Producto</h3>
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
                                <input type="text" wire:model="nombre" value="{{ $nombre }}" class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Precio
                                        </label>
                                        <input type="number" wire:model="precio" value="{{ $precio }}"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Calificación
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="calificacion"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                                <option value="1" {{ $calificacion === 1 ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ $calificacion === 2 ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ $calificacion === 3 ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ $calificacion === 4 ? 'selected' : '' }}>4</option>
                                                <option value="5" {{ $calificacion === 5 ? 'selected' : '' }}>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Cantidad
                                        </label>
                                        <input type="number" wire:model="cantidad" value="{{ $cantidad }}"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                </div>
                                <label>
                                    <span class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">Descripción</span>
                                    <textarea type="text" wire:model="descripcion"
                                              class="block w-full px-4 py-3 mt-1 mb-3 text-gray-700 bg-gray-200 border border-gray-200 rounded form-textarea focus:outline-none"
                                              rows="2" placeholder="">{{ $descripcion }}</textarea>
                                </label>
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Empresa
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="empresa_id"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                @foreach($empresas as $empresa)
                                                    <option value="{{ $empresa->id }}" {{ $empresa_id === $empresa->id ? 'selected' : '' }}>{{ $empresa->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Marca
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="marca_id"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                @foreach($marcas as $marca)
                                                    <option value="{{ $marca->id }}" {{ $marca_id === $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-state">
                                            Garantía
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="garantia_id"
                                                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-state">
                                                @foreach($garantias as  $garantia)
                                                    <option value="{{ $garantia->id }}" {{ $garantia_id === $garantia->id ? 'selected' : '' }}>{{ $garantia->tiempo }} meses</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('nombre')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('descripcion')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('precio')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('calificacion')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                    @error('cantidad')
                                    <span class="error">{{ $message }}</span>
                                    <p>error</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="flex items-center justify-end p-1 text-center bg-gray-200">
                        <div class="m-3">
                            <button wire:click="editProducto" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center disabled:opacity-50" @if ($errors->has('nombre') || $errors->has('descripcion') || $errors->has('precio') || $errors->has('cantidad') || empty($nombre) || empty($descripcion) || empty($precio) || empty($cantidad)) disabled @else onclick="ocultarModalEdit()" @endif>
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
                <h3 class="font-semibold text-lg">Eliminar producto</h3>
                <button wire:click="resetarValores()" class="text-black" onclick="ocultarModalDelete()">&cross;</button>
            </div>
            <!-- modal body -->
            <div class="p-3">
                Está seguro que desea eliminar este producto?
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
                    <button wire:click="eliminarProducto" onclick="ocultarModalDelete()" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
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
            const modalSee = document.querySelector('.modal-see');
            const modalEdit = document.querySelector('.modal-edit');
            const modalDelete = document.querySelector('.modal-delete');

            //para mostrar los modales
            function mostrarModalCreate(){
                modalCreate.classList.remove('hidden')
            }

            function mostrarModalSee(){
                modalSee.classList.remove('hidden')
            }

            function mostrarModalEdit(){
                modalEdit.classList.remove('hidden')
            }

            function mostrarModalDelete(){
                modalDelete.classList.remove('hidden')
            }

            //para ocultar los modales
            function ocultarModalCreate(){
                modalCreate.classList.add('hidden')
            }

            function ocultarModalSee(){
                modalSee.classList.add('hidden')
            }

            function ocultarModalEdit(){
                modalEdit.classList.add('hidden')
            }

            function ocultarModalDelete(){
                modalDelete.classList.add('hidden')
            }
        </script>
    @endpush
</div>
