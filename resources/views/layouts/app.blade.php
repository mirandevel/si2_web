<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">



        <x-jet-banner />

        <div class="min-h-screen bg-gray-100 bg-paleta-5">
            @livewire('navigation-menu')

            <!-- Page Heading -->
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}

            <!-- Page Content -->
            <main >
                <x-modal-menu>
                    <x-menu></x-menu>
                </x-modal-menu>

                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
             https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-analytics.js"></script>
        <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-storage.js"></script>

        <script>
            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();
        </script>

        @livewireScripts
    </body>
</html>
