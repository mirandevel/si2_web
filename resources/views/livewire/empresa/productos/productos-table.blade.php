<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Productos</h2>
            </div>

            <div class="relative flex justify-center">
                <x-buscador wire:model="nombreDeProductoABuscar">
                </x-buscador>
                <div class="absolute right-0">
                    <x-jet-button type="button" wire:click="cargarDatosPorDefecto()" onclick="mostrarModalCreate()">
                        Crear +
                    </x-jet-button>
                </div>
            </div>
            <div class="my-2 flex sm:flex-row flex justify-center">
            </div>

            <div class="flex justify-center my-5">
                <div class="flex flex-col">
                    <x-jet-label for="cantidad" class="text-black text-base text-center" value="{{ __('Cantidad') }}"/>
                    <select wire:model="cantidadDeItemsPorPagina" type="int"
                            id="cantidad"
                            class="appearance-none h-full rounded border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-5 gap-10">
                @foreach($productos as $producto)
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
                                        <button class="w-full block px-4 text-left py-1" wire:click="cargarDatos({{ $producto->id }})"
                                                onclick="mostrarModalSee()">
                                            <span class="mr-2">Ver</span>
                                        </button>
                                        <div class="border-t border-gray-200"></div>
                                        <button class="w-full block px-4 text-left py-1" wire:click="cargarDatos({{ $producto->id }})"
                                                onclick="mostrarModalEdit()">
                                            <span class="mr-2">Editar</span>
                                        </button>
                                        <div class="border-t border-gray-200"></div>
                                        <button class="w-full block px-4 text-left py-1" wire:click="$set('idDeProductoSeleccionado', {{ $producto->id }})"
                                                onclick="mostrarModalDelete()">
                                            <span class="mr-2">Eliminar</span>
                                        </button>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        </div>
                        <img class="border-b-2 border-paleta-4" src="{{$producto->url_imagen}}">
                        <div class="px-3 py-2 bg-white">
                            <div class="relative flex">
                                <p class="text-black text-lg">{{ucfirst($producto->nombre)}}</p>
                                <p class="text-black text-xl absolute right-0">{{$producto->precio}}$</p>
                            </div>
                            <div class="flex items-center mt-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($producto->calificacion>=$i)
                                        <svg class="w-4 h-4 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    @else
                                        <svg class="w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    @endif
                                @endfor
                            </div>
                            <p>Disponibles: {{$producto->cantidad}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="px-5 py-5 bg-white border-t items-center xs:justify-between">
                {{ $productos->links() }}
            </div>
        </div>
    </div>

    <!-- modal para ver -->
    <div wire:ignore.self
         class="modal-see h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
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
                            @if($empresa->id === session('empresa_id'))
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
    <div wire:ignore.self
         class="modal-create h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
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
                                <div class="mt-4 flex justify-center">
                                    <img  id="image" class="h-2/3 w-2/3" src="{{$photoTemp}}">
                                </div>
                                <x-jet-button id="select" type="button">Seleccionar imagen</x-jet-button>
                                <x-jet-button id="select3d" type="button">Seleccionar 3D</x-jet-button>
                                <x-jet-label for="select3d" id="label3d">{{$temp3d}}</x-jet-label>
                                <label class="block my-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                       for="grid-email">
                                    Nombre
                                </label>
                                <input type="text" wire:model="nombre" id="nombre"
                                       class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <div class="flex flex-wrap -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Precio
                                        </label>
                                        <input type="number" wire:model="precio"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
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
                                              rows="1" placeholder=""></textarea>
                                </label>
                                <div class="flex flex-wrap -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
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
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                            for="grid-state">
                                            Categoría
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="categoria_id"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-state">
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                            for="grid-state">
                                            Garantía
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="garantia_id"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-state">
                                                @foreach($garantias as  $garantia)
                                                    <option value="{{ $garantia->id }}">{{ $garantia->tiempo }}meses
                                                    </option>
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
                    <div class="flex items-center justify-end text-center bg-gray-200">
                        <div id="container" class="flex-col justify-center>
                        <x-jet-label for="progressBar1" id="labell">Subiendo imagen</x-jet-label>
                        <progress id="progressBar1" value="0" max="100" style="width:300px;"></progress>
                        <x-jet-label for="progressBar" id="labelll">Subiendo 3D</x-jet-label>
                            <progress  id="progressBar" value="0" max="100" style="width:300px;"></progress>

                        </div>
                        <div class="m-3">
                            <x-jet-button class="ml-4" id="send" type="button">
                                {{ __('Guardar') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal para editar -->
    <div wire:ignore.self
         class="modal-edit h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
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
                                <div class="mt-4 flex justify-center">
                                    <img  id="image" class="h-2/3 w-2/3" src="{{$photoTemp}}">
                                </div>
                                <x-jet-button id="select1" type="button">Seleccionar imagen</x-jet-button>
                                <x-jet-button id="select3d1" type="button">Seleccionar 3D</x-jet-button>
                                <x-jet-label for="select3d1" id="label3d">{{$temp3d}}</x-jet-label>
                                <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                       for="grid-email">
                                    Nombre
                                </label>
                                <input type="text" id="nombre1" wire:model="nombre" value="{{ $nombre }}"
                                       class="block w-full px-4 py-3 mb-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
                                            Precio
                                        </label>
                                        <input type="number" wire:model="precio" value="{{ $precio }}"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                            for="grid-state">
                                            Promoción
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="promocion"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                                <option value="0">ninguna</option>
                                                @foreach($promociones as $promocion)
                                                    <option value="{{ $promocion->id }}">{{ $promocion->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase">
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
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                            for="grid-state">
                                            Marca
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="marca_id"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-state">
                                                @foreach($marcas as $marca)
                                                    <option
                                                        value="{{ $marca->id }}" {{ $marca_id === $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                            for="grid-state">
                                            Categoría
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="categoria_id"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-state">
                                                @foreach($categorias as $categoria)
                                                    <option value="{{ $categoria->id }}" {{ $categoria->id === $categoria_id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/3 md:mb-0">
                                        <label
                                            class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                            for="grid-state">
                                            Garantía
                                        </label>
                                        <div class="relative">
                                            <select type="number" wire:model="garantia_id"
                                                    class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-state">
                                                @foreach($garantias as  $garantia)
                                                    <option
                                                        value="{{ $garantia->id }}" {{ $garantia_id === $garantia->id ? 'selected' : '' }}>{{ $garantia->tiempo }}
                                                        meses
                                                    </option>
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
                            <button wire:click="editProducto"
                                    class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center disabled:opacity-50"
                                    @if ($errors->has('nombre') || $errors->has('descripcion') || $errors->has('precio') || $errors->has('cantidad') || empty($nombre) || empty($descripcion) || empty($precio) || empty($cantidad)) disabled
                                    @else onclick="ocultarModalEdit()" @endif>
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
    <div wire:ignore.self
         class="modal-delete h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
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
                    <button wire:click="resetarValores()" onclick="ocultarModalDelete()"
                            class="bg-white text-gray-800 font-bold rounded border-b-2 border-red-500 hover:border-red-600 hover:bg-red-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                        <span class="mr-2">Cancelar</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                            <path fill="currentcolor"
                                  d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                        </svg>
                    </button>
                </div>
                <div class="m-3">
                    <button wire:click="eliminarProducto" onclick="ocultarModalDelete()"
                            class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-1 px-1 inline-flex items-center">
                        <span class="mr-2">Aceptar</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24">
                            <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>


    <script>
        var ImgName,ImgURl;
        var files=[];
        var files1=[];
        var reader=new FileReader();
        var reader1=new FileReader();

        var firebaseConfig = {
            apiKey: "AIzaSyBU9StoOCTr5N17b8w7MpiAU0MGgGks8K8",
            authDomain: "si-2-5abca.firebaseapp.com",
            projectId: "si-2-5abca",
            storageBucket: "si-2-5abca.appspot.com",
            messagingSenderId: "784239077649",
            appId: "1:784239077649:web:97c63a985cc3dacde944b0",
            measurementId: "G-6EDF0QWQZ3"
        };
        // Initialize Firebase


        document.getElementById("select3d").onclick=function (e){
            var input=document.createElement('input');
            input.type='file';

            input.onchange=e=>{
                files1=e.target.files;
                reader1=new FileReader();
                reader1.onload=function (){
                    // document.getElementById("image").src=reader.result;
                    //document.getElementById("label3d").label = "newLabel";
                    //document.getElementById("label3d").innerHTML('holaaaaa');
                    Livewire.emit('temp3d','3D cargado');
                }
                reader1.readAsDataURL(files1[0]);
            }
            input.click();
        }

        document.getElementById("select").onclick=function (e){
            var input=document.createElement('input');
            input.type='file';

            input.onchange=e=>{
                files=e.target.files;
                reader=new FileReader();
                reader.onload=function (){
                    //document.getElementById("image").src=reader.result;
                    Livewire.emit('temp',reader.result);
                }
                reader.readAsDataURL(files[0]);
            }
            input.click();
        }

        document.getElementById("send").onclick=function (){
            console.log('click');





            if(document.getElementById('nombre').value === ''){
                alert('rellene todos los campos');
            }else{
                ImgName=document.getElementById('nombre').value;


                var extension = files1[0].name.split('.').pop().toLowerCase();
                console.log(extension);
                var uploadTask1=firebase.storage().ref('Productos/3d/'+ImgName+"."+extension).put(files1[0]);

                uploadTask1.on('state_changed', function(snapshot){
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    console.log('Upload is ' + progress + '% done');
                    document.getElementById('progressBar').value = Math.round(progress);
                }, function(error) {
                    // Handle unsuccessful uploads
                    console.log(error);
                }, function() {
                    // Handle successful uploads on complete
                    // For instance, get the download URL: https://firebasestorage.googleapis.com/...
                    uploadTask1.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                        console.log('Model: ', downloadURL);
                        Livewire.emit('model',downloadURL);
                    });
                });


                var uploadTask=firebase.storage().ref('Productos/'+ImgName+".png").put(files[0]);

                uploadTask.on('state_changed', function(snapshot){
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    console.log('Upload is ' + progress + '% done');
                    document.getElementById('progressBar1').value = Math.round(progress);
                }, function(error) {
                    // Handle unsuccessful uploads
                    console.log(error);
                }, function() {
                    // Handle successful uploads on complete
                    // For instance, get the download URL: https://firebasestorage.googleapis.com/...
                    uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                        console.log('image: ', downloadURL);
                        Livewire.emit('image',downloadURL);
                    });
                });


            }


        }

    </script>

    @push('modals')
        <script>
            const modalCreate = document.querySelector('.modal-create');
            const modalSee = document.querySelector('.modal-see');
            const modalEdit = document.querySelector('.modal-edit');
            const modalDelete = document.querySelector('.modal-delete');

            //para mostrar los modales
            function mostrarModalCreate() {
                modalCreate.classList.remove('hidden')
            }

            function mostrarModalSee() {
                modalSee.classList.remove('hidden')
            }

            function mostrarModalEdit() {
                modalEdit.classList.remove('hidden')
            }

            function mostrarModalDelete() {
                modalDelete.classList.remove('hidden')
            }

            window.addEventListener('creado', event => {
                ocultarModalCreate();
            })

            //para ocultar los modales
            function ocultarModalCreate() {
                modalCreate.classList.add('hidden')
            }

            function ocultarModalSee() {
                modalSee.classList.add('hidden')
            }

            function ocultarModalEdit() {
                modalEdit.classList.add('hidden')
            }

            function ocultarModalDelete() {
                modalDelete.classList.add('hidden')
            }
        </script>
    @endpush
</div>
