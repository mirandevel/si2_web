<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>


<div class="min-h-screen  font-sans text-gray-900 bg-paleta-5 antialiased">
    <div class="flex-col justify-center">
    <span class="text-2xl w-full text-center font-bold">GRACIAS POR SU COMPRA</span>
        <br>
    <span class="text-xl font-bold">Total:{{$factura->total}}</span>
    <span>Fecha:{{$factura->fecha}}</span>
    </div>
    <div class="inline-block min-w-full shadow rounded-lg border-paleta-4 border-2 overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
            <tr>
                <th
                    class="px-5 py-3 border-b-2 border-black text-center text-xs  text-white uppercase">
                    Nombre
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-black text-center text-xs  text-white uppercase">
                    Cantidad
                </th>
                <th
                    class="px-5 py-3 border-b-2 border-black  text-center text-xs  text-white uppercase">
                    Precio
                </th>

            </tr>
            </thead>
            <tbody>

            @foreach($detalles as $detalle)
                <tr>
                    <td class="px-5 py-5 border-b border-black bg-white text-sm">
                        <p class="text-gray-900 text-center whitespace-no-wrap">{{$detalle['nombre']}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-black bg-white text-sm">
                        <p class="text-gray-900 text-center whitespace-no-wrap">{{$detalle['cantidad']}}</p>
                    </td>
                    <td class="px-5 py-5 border-b border-black bg-white text-sm">
                        <p class="text-gray-900 text-center whitespace-no-wrap">{{$detalle['precio']}}</p>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

</div>

@livewireScripts
</body>
</html>
