<div>
    <div class="pb-1 text-center text-gray-700 bg-cover">
        <div class="container relative max-w-2xl px-5 pt-12 mx-auto sm:py-12 lg:px-0">
            <h2 class="mb-1 text-4xl font-extrabold leading-10 tracking-tight text-left text-gray-900 sm:text-5xl sm:leading-none md:text-6xl sm:text-center">
                Reportes</h2>
{{--            <p>{{ $message ? 'uno' : 'cero' }}</p>--}}
{{--            <p>{{ gettype($message) }}</p>--}}
{{--            <p>{{ $fechaInicio }}</p>--}}
{{--            <p>{{ $fechaFin }}</p>--}}
{{--            <p>{{ $adm ? 'es admin' : 'no es admin' }}</p>--}}
{{--            <p>{{ $empresaid }}</p>--}}
        </div>
        <div class="mb-5">
            <div class="max-w-xl px-4 mx-auto sm:px-6 lg:max-w-screen-xl lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="p-16 transition-all duration-150 bg-white rounded-lg shadow-xl ease hover:shadow-2xl">
                        <div
                            class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden text-white rounded-none">
                            <img src="{{ asset('photos/cart.svg') }}">
                        </div>
                        <div class="mt-3 mb-6">
                            <h5 class="pb-2 text-xl font-bold leading-6 text-gray-600">Reporte de ventas</h5>
                            <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                           for="grid-zip">
                                        Fecha inicio
                                    </label>
                                    <input wire:model="fechaInicio"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="date" value="{{ $fechaInicio }}">
                                </div>
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                           for="grid-zip">
                                        Fecha Fin
                                    </label>
                                    <input wire:model="fechaFin"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        type="date" value="{{ $fechaFin }}">
                                </div>
                            </div>
                            <div class="m-3">
                                <button wire:click="descargarReporteDeVentas()"
                                    class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                    <span class="mx-auto">Descargar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-16 mt-10 transition-all duration-150 bg-white rounded-lg shadow-xl lg:mt-0 ease hover:shadow-2xl">
                        <div
                            class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden text-white rounded-none">
                            <img src="{{ asset('photos/box.svg') }}">
                        </div>
                        <div class="mt-3 mb-6">
                            <h5 class="pb-2 text-xl font-bold leading-6 text-gray-600">Reporte de productos</h5>
                            <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                           for="grid-zip">
                                        Fecha inicio
                                    </label>
                                    <input wire:model="fechaInicioProducto"
                                           class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                           type="date" value="{{ $fechaInicioProducto }}">
                                </div>
                                <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                    <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                           for="grid-zip">
                                        Fecha Fin
                                    </label>
                                    <input wire:model="fechaFinProducto"
                                           class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                           type="date" value="{{ $fechaFinProducto }}">
                                </div>
                            </div>
                            <div class="m-3">
                                <button wire:click="descargarReporteDeProductos()"
                                    class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                    <span class="mx-auto">Descargar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @if(session('entrada_adm'))
                        <div
                            class="p-16 mt-10 transition-all duration-150 bg-white rounded-lg shadow-xl lg:mt-0 ease hover:shadow-2xl">
                            <div
                                class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden text-white rounded-none">
                                <img src="{{ asset('photos/users.svg') }}">
                            </div>
                            <div class="mt-3 mb-6">
                                <h5 class="pb-2 text-xl font-bold leading-6 text-gray-600">Reporte de Usuarios Registrados</h5>
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-zip">
                                            Fecha inicio
                                        </label>
                                        <input wire:model="fechaInicioUsuario"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                               type="date" value="{{ $fechaInicioUsuario }}">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-zip">
                                            Fecha Fin
                                        </label>
                                        <input wire:model="fechaFinUsuario"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                               type="date" value="{{ $fechaFinUsuario }}">
                                    </div>
                                </div>
                                <div class="m-3">
                                    <button wire:click="descargarReporteDeUsuarios()"
                                            class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                        <span class="mx-auto">Descargar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-16 mt-10 transition-all duration-150 bg-white rounded-lg shadow-xl lg:mt-0 ease hover:shadow-2xl">
                            <div
                                class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden text-white rounded-none">
                                <img src="{{ asset('photos/factory.svg') }}">
                            </div>
                            <div class="mt-3 mb-6">
                                <h5 class="pb-2 text-xl font-bold leading-6 text-gray-600">Reporte de Empresas Registradas</h5>
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-zip">
                                            Fecha inicio
                                        </label>
                                        <input wire:model="fechaInicioEmpresa"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                               type="date" value="{{ $fechaInicioEmpresa }}">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-zip">
                                            Fecha Fin
                                        </label>
                                        <input wire:model="fechaFinEmpresa"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                               type="date" value="{{ $fechaFinEmpresa }}">
                                    </div>
                                </div>
                                <div class="m-3">
                                    <button wire:click="descargarReporteDeEmpresas()"
                                            class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                        <span class="mx-auto">Descargar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="p-16 mt-10 transition-all duration-150 bg-white rounded-lg shadow-xl lg:mt-0 ease hover:shadow-2xl">
                            <div
                                class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden text-white rounded-none">
                                <img src="{{ asset('photos/bitacora.svg') }}">
                            </div>
                            <div class="mt-3 mb-6">
                                <h5 class="pb-2 text-xl font-bold leading-6 text-gray-600">Reporte de Bitacoras</h5>
                                <div class="flex flex-wrap m-6 mb-2 -mx-3">
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-zip">
                                            Fecha inicio
                                        </label>
                                        <input wire:model="fechaInicioBitacoras"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                               type="date" value="{{ $fechaInicioBitacoras }}">
                                    </div>
                                    <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
                                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                               for="grid-zip">
                                            Fecha Fin
                                        </label>
                                        <input wire:model="fechaFinBitacoras"
                                               class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                               type="date" value="{{ $fechaFinBitacoras }}">
                                    </div>
                                </div>
                                <div class="m-3">
                                    <button wire:click="descargarReporteDeBitacoras()"
                                            class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                        <span class="mx-auto">Descargar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
