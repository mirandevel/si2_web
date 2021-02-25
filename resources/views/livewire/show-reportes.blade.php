<div>
    <div class="pb-1 text-center text-gray-700 bg-cover">
        <div class="container relative max-w-2xl px-5 pt-12 mx-auto sm:py-12 lg:px-0">
            <h2 class="mb-1 text-4xl font-extrabold leading-10 tracking-tight text-left text-gray-900 sm:text-5xl sm:leading-none md:text-6xl sm:text-center">
                Reportes</h2>
            <p>{{ $message ? 'uno' : 'cero' }}</p>
            <p>{{ gettype($message) }}</p>
        </div>
        <div class="my-1">
            <div class="max-w-xl px-4 mx-auto sm:px-6 lg:max-w-screen-xl lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                    <div class="p-16 transition-all duration-150 bg-white rounded-lg shadow-xl ease hover:shadow-2xl">
                        <div
                            class="relative inline-flex items-center justify-center w-16 h-16 overflow-hidden text-white rounded-none">
                            <img src="{{ asset('photos/cart.svg') }}">
                        </div>
                        <div class="mt-3 mb-6">
                            <h5 class="pb-2 text-xl font-bold leading-6 text-gray-600">Reporte de ventas</h5>
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
                            <div class="m-3">
                                <button wire:click="descargarReporteDeProductos()"
                                    class="w-32 bg-white tracking-wide text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                                    <span class="mx-auto">Descargar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('modals')
        <script>

        </script>
    @endpush
</div>
