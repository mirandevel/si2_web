<div class="bg-gray-200 font-sans z-50">
    <div class="flex flex-col sm:flex-row sm:justify-start">

        <div class="h-screen bg-gray-800">
            <div class="flex justify-between p-5">
                {{--<img class="h-6 w-6 rounded-full mr-3 object-cover"
                     src="https://1000marcas.net/wp-content/uploads/2019/12/Pinterest-Logo.png" alt="logo">--}}
                <span class="mx-4 font-medium text-lg text-gray-100">Menú</span>

                <button @click="menu = false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                         style="fill:rgb(243,244,246);transform:;-ms-filter:">
                        <path
                            d="M16.192 6.344L11.949 10.586 7.707 6.344 6.293 7.758 10.535 12 6.293 16.242 7.707 17.656 11.949 13.414 16.192 17.656 17.606 16.242 13.364 12 17.606 7.758z">
                        </path>
                    </svg>
                </button>
            </div>
            <nav class="">
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Principal</span>
                        </span>

                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </button>

                    <div x-show="open" class="bg-gray-700">
                        <a class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white"
                           href="{{route('adm.dashboard')}}">Dashboard</a>
                        <a class="py-2 px-16 block text-sm text-gray-100 hover:bg-blue-500 hover:text-white"
                           href="{{route('adm.estadisticas')}}">Ver estadísticas</a>
                    </div>
                </div>

                <div >
                    <a href="{{route('adm.empresas')}}"
                       class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Empresas</span>
                        </span>
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>

                            </svg>
                        </span>
                    </a>
                </div>

                <div >
                    <a href="{{route('adm.usuarios')}}"
                            class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span class="mx-4 font-medium">Usuarios</span>
                        </span>
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>

                            </svg>
                        </span>
                    </a>
                </div>

                <div >
                    <a href="{{ route('reportes') }}"
                       class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Reporte</span>
                        </span>
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>

                            </svg>
                        </span>
                    </a>
                </div>

                <div >
                    <a href="{{route('adm.bitacora')}}"
                       class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>

                            <span class="mx-4 font-medium">Bitacora</span>
                        </span>
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>

                            </svg>
                        </span>
                    </a>
                </div>
                <div >
                    <a href="{{route('start')}}"
                       class="w-full flex justify-between items-center py-3 px-6 text-gray-100 cursor-pointer hover:bg-gray-700 hover:text-gray-100 focus:outline-none">
                        <span class="flex items-center">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <span class="mx-4 font-medium">Cerrar administración</span>
                        </span>
                        <span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path x-show="open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>

                            </svg>
                        </span>
                    </a>
                </div>
            </nav>

        </div>
    </div>
</div>
