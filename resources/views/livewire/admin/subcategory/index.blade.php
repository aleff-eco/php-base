<div class="min-h-screen mb-4 rounded-lg shadow-xl dark:-gray-600">
    <button type="button" onclick="history.back()"
        class="relative w-40 font-sans text-xl font-semibold text-center text-black bg-white rounded-2xl h-10 group mt-3">
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
    <!-- Start block -->
    <section class="p-3 antialiased bg-gray-50 dark:bg-gray-900 sm:p-5">
        <h3 class="mt-3 text-3xl font-bold dark:text-white">Subcategorias</h3>
        <div class="mx-auto mt-3">
            <!-- Start coding here -->
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div
                    class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/3">
                        {{-- BARRA DE BUSQUEDA --}}
                        <div class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" wire:keydown="searchElement()"
                                    wire:model="search"
                                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Buscar subcategorias" required="">
                            </div>
                        </div>
                        {{-- BARRA DE BUSQUEDA --}}
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <a href="{{ route('categories.subcategories.create', [$categoryId]) }}"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white  bg-blue-400 hover:bg-blue-500 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Crear nuevo
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3 w-[35%]">Codigo</th>
                                <th scope="col" class="px-4 py-3">Nombre</th>
                                <th scope="col" class="px-4 py-3 w-[18%]">
                                    <span class="sr-only">Actions</span>
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategories as $subcategory)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $subcategory->code }}
                                    </td>
                                    <td class="px-4 py-3 max-w-[12rem] truncate">
                                        {{ $subcategory->name }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex flex-col items-start gap-2">
                                            <a href="{{ route('categories.subcategories.edit', [$categoryId, $subcategory->id]) }}"
                                                class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                                Editar subcategoria
                                            </a>
                                            <a wire:click="confirmDeleteSubcategory({{ $subcategory->id }})"
                                                class="inline-flex items-center h-full  cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 6h18M9 6v12m6-12v12m-7 4h8a2 2 0 0 0 2-2V6H5v12a2 2 0 0 0 2 2z" />
                                                </svg>
                                                <span class="ml-1">Eliminar</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($subcategoryIdToDelete)
                        <div class="fixed inset-0 flex items-center justify-center z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg">
                                <h3 class="text-lg font-medium">Confirmar eliminación</h3>
                                <p class="mt-4">¿Estás seguro de que deseas eliminar esta categoría?</p>
                                <div class="mt-4 flex justify-between">
                                    <button wire:click="deleteSubcategory"
                                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                                        Eliminar
                                    </button>
                                    <button wire:click="closeModal"
                                        class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-600">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="fixed inset-0 bg-black opacity-50 z-40"></div>
                    @endif
                </div>
            </div>
    </section>
    <!-- End block -->
    <div class="pb-5">{{ $subcategories->links() }}

    </div>

</div>
