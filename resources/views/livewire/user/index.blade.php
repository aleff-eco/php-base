<div class="min-h-screen p-3">
    <button type="button" onclick="history.back()"
        class="relative w-40 font-sans text-xl font-semibold text-center text-black bg-white rounded-2xl h-10 group">
        <div
            class="bg-blue-400 rounded-xl h-8 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[150px] z-10 duration-500">
            <svg width="25px" height="25px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                <path fill="#ffff" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"></path>
                <path fill="#ffff"
                    d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z">
                </path>
            </svg>
        </div>
        <p class="translate-x-2">Regresar</p>
    </button>
    <h3 class="mt-5 text-3xl h-100vh font-bold dark:text-white">Usuarios</h3>
    <div class="relative mt-3 overflow-x-auto shadow-md sm:rounded-lg">
        <div
            class="flex flex-wrap items-center justify-between pb-4 space-y-4 bg-white flex-column md:flex-row md:space-y-0 dark:bg-gray-900">

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model='search' wire:keydown="searchElement()" type="text" id="table-search-users"
                    class="block p-2 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar usuarios">
            </div>

            <a href="{{ route('users.create') }}"
                class="flex items-center justify-center px-4 py-2 ml-auto text-sm font-medium text-white bg-blue-400 hover:bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Crear nuevo
            </a>
        </div>


        <table class="w-full overflow-auto text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estatus
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{ $user->id }}
                        </td>
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg"
                            alt="Jese image"> --}}
                            <div class="ps-3">
                                <div class="text-base font-semibold"></div>
                                <div class="font-normal text-gray-500">{{ $user->names }}
                                    {{ $user->surnames }}
                                </div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $user->role->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if ($user->status->name == 'Activo')
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                    {{ $user->status->name }}
                                @elseif ($user->status->name == 'Inactivo')
                                    <div class="h-2.5 w-2.5 rounded-full  bg-red-500 me-2"></div>
                                    {{ $user->status->name }}
                                @elseif ($user->status->name == 'Eliminado')
                                    <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div>
                                    {{ $user->status->name }}
                                @else
                                    <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div>
                                    Undefined
                                @endif
                            </div>
                        </td>

                        <td>
                            <div class="flex flex-col items-start gap-2">
                                <a href="{{ route('users.edit', $user) }}" class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="w-6 h-6">
                                        <path
                                            d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                        <path
                                            d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                    </svg>
                                    Editar
                                </a>


                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
