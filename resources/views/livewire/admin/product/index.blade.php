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
        <h3 class="mt-3 text-3xl font-bold dark:text-white">Productos</h3>
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
                                    placeholder="Buscar productos" required="">
                            </div>
                        </div>
                        {{-- BARRA DE BUSQUEDA --}}
                    </div>
                    <div
                        class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                        <a href="{{ route('categories.index') }}"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-400 hover:bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-5 w-7 mr-2" fill="none" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Ver categorías
                        </a>
                        <a href="{{ route('products.create') }}"
                            class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-400 hover:bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Crear nuevo
                        </a>

                        {{-- <div class="flex items-center w-full space-x-3 md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                                Filtro
                            </button>
                            <div id="actionsDropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                            Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                        all</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-4">Imagen</th>
                                <th scope="col" class="px-4 py-4">Título</th>
                                <th scope="col" class="px-4 py-3">Descripción</th>
                                <th scope="col" class="px-4 py-3">Precio</th>
                                <th scope="col" class="px-4 py-3">Inventario</th>
                                <th scope="col" class="px-4 py-3">Estatus</th>
                                <th scope="col" class="px-2 py-2">
                                    <span class="sr-only">Actions</span>
                                    <span class="">Acciones</span>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $row)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3 flex items-center justify-center">
                                        <img src="{{ Storage::url($row->image_path) }}" alt="{{ $row->name }}" class="w-24 h-24 object-cover rounded-lg">
                                    </td>                                                                       
                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $row->name }}</th>
                                    <td class="px-4 py-3 max-w-[12rem] truncate">
                                        {{ $row->description }}</td>
                                    <td class="px-4 py-3">
                                        @if ($row->price)
                                            ${{ number_format($row->price->price, 2) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        @if ($row->inventory)
                                            {{ number_format($row->inventory->quantity) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex items-center">
                                            <div
                                                class="h-2.5 w-2.5 rounded-full {{ $row->status_id == '4' ? 'bg-green-500' : 'bg-red-500' }} me-2">
                                            </div>
                                            {{ $row->status->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-col items-start gap-2">
                                            <a href="{{ route('inventories.edit', $row) }}"
                                                class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6 mr-1">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                                </svg>
                                                Editar inventario
                                            </a>
                                            <a href="{{ route('products.edit', $row) }}"
                                                class="inline-flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                                </svg>
                                                Editar producto
                                            </a>
                                            <button class="inline-flex items-center h-full"
                                                wire:click="selectedProduct({{ $row->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6 mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                                Ver
                                            </button>
                                            <!-- Estilos con Tailwind CSS -->
                                            <div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($modalOpen && $product)
                        <div
                            class="fixed top-0 left-0 z-50 flex items-center justify-center w-full h-screen bg-black bg-opacity-50">
                            <div class="max-w-2xl p-8 bg-white rounded-lg">
                                <h3 class="text-xl font-bold text-slate-800">Nombre</h3>
                                <p class="text-md font-normal text-slate-700">{{ $product->name }}</p>
                                <h3 class="text-xl font-bold text-slate-800">Descripción</h3>
                                <p class="text-md font-normal text-slate-700">{{ $product->description }}</p>
                                <h3 class="text-xl font-bold text-slate-800">Codigo del producto</h3>
                                <p class="text-md font-normal text-slate-700">{{ $product->code }}</p>
                                <h3 class="text-xl font-bold text-slate-800">Categoria:</h3>
                                <p class="text-md font-normal text-slate-700">Nombre: {{ $product->category->code }}
                                </p>
                                <p class="text-md font-normal text-slate-700">Descripcion:
                                    {{ $product->category->name }}</p>
                                <h3 class="text-xl font-bold text-slate-800">Sub-categoria:</h3>
                                <p class="text-md font-normal text-slate-700">CODE: {{ $product->subcategory->code }}
                                </p>
                                <p class="text-md font-normal text-slate-700">Nombre:
                                    {{ $product->subcategory->name }}</p>
                                <button
                                    class="px-4 py-2 content-center justify-center items-center mt-4 text-white bg-red-500 rounded hover:bg-gray-700"
                                    wire:click="closeModal">Cerrar</button>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
    </section>
    <!-- End block -->
    <div class="pb-5">{{ $products->links() }}

    </div>

</div>
