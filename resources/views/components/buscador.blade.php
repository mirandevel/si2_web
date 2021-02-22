<div class=" flex w-2/5  border-2 border-paleta-4 rounded bg-white px-5 py-2 ">

    <input placeholder="Buscar" {{$attributes->wire('model') }}
           class="appearance-none  w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />

    <span class="h-full  inset-y-0 left-0 flex items-center pl-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                             style="fill:rgba(36, 55, 98, 1);transform:;-ms-filter:">
                            <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z">
                            </path></svg>
                    </span>
</div>
