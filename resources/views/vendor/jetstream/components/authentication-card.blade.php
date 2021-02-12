<div class="min-h-screen min-w-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-paleta-5">
    <svg class="absolute transform -translate-y-1/3 -translate-x-3/4" xmlns="http://www.w3.org/2000/svg" width="1114" height="1342" viewBox="0 0 1114 1342">
        <ellipse id="Elipse_1" data-name="Elipse 1" cx="557" cy="671" rx="557" ry="671" fill="#fdce5a"/>
    </svg>

    <svg class="fixed transform translate-y-1/3 translate-x-3/4" xmlns="http://www.w3.org/2000/svg" width="1114" height="1342" viewBox="0 0 1114 1342">
        <ellipse id="Elipse_2" data-name="Elipse 2" cx="557" cy="671" rx="557" ry="671" fill="#243762"/>
    </svg>

    <div class="flex justify-center">
        <h1 class="font-semibold text-7xl text-black">REALITY</h1>
    </div>
    <div style="background: RGBA(173,224,205,0.13);" class="w-full h-full sm:max-w-xl sm:max-h-md  px-32 py-4 border border-paleta-8 shadow-md overflow-hidden sm:rounded-md">
        <div class="flex justify-center my-10">
            {{ $logo }}
        </div>
        {{ $slot }}
    </div>
</div>
