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
    <body >


        <div class="min-h-screen  font-sans text-gray-900 bg-paleta-5 antialiased">
            <span>Fecha:{{$factura->fecha}}</span>
            <span>Total:{{$factura->total}}</span>
            @foreach($detalles as $detalle)
                <div class="grid grid-cols-3 gap-4">
                    <span>{{$detalle['nombre']}}</span>
                    <span>{{$detalle['cantidad']}}</span>
                    <span>{{$detalle['precio']}}</span>
                </div>
            @endforeach


        </div>

        }

        @livewireScripts
    </body>
</html>
