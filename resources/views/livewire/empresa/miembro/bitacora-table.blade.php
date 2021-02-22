<div>
    <div class="container antialiased font-sans mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Bitácora</h2>
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
                                    Descripción
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2  text-center text-xs  text-white uppercase">
                                    Fecha
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-paleta-4 bg-paleta-2  text-center text-xs text-white uppercase">
                                    Hora
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bitacoras as $bitacora)
                                <tr>
                                    <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{'Jose luis miranda'}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{$bitacora->descripcion}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{$bitacora->fecha}}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-paleta-4 bg-white text-sm">
                                        <p class="text-gray-900 text-center whitespace-no-wrap">{{$bitacora->hora}}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="px-5 py-5 bg-white border-t items-center xs:justify-between">
                            {{ $bitacoras->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
