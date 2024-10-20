<div>
    <a href="{{ route('products.index') }}">
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
    </a>
    <div class="container max-w-xl min-h-screen px-4 py-8 mx-auto">
        <div class="mx-auto bg-white rounded-lg shadow-xl overflow-scrollflow-hidden dark:bg-gray-700">
            <div class="px-8 py-6">
                <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">Agregar Producto</h2>
                <form wire:submit.prevent="save" class="space-y-4">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 font-bold text-gray-700 dark:text-white">Nombre del
                            Producto</label>
                        <input type="text" id="name" name="name" wire:model="name"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'name'])
                    </div>
                    <div class="mb-4">
                        <label for="description"
                            class="block mb-2 font-bold text-gray-700 dark:text-white">Descripción</label>
                        <input type="text" id="description" name="description" wire:model="description"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'description'])
                    </div>
                    <div class="mb-4">
                        <label for="code" class="block mb-2 font-bold text-gray-700 dark:text-white">Clave</label>
                        <input type="text" id="code" name="code" wire:model="code"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'code'])
                    </div>
                    <div class="mb-4">
                        <label for="iva" class="block mb-2 font-bold text-gray-700 dark:text-white">IVA</label>
                        <div class="relative">
                            <select wire:model.lazy="iva"
                                class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                                id="iva">
                                <option value="1">SI</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                        @include('partials.message', ['input' => 'iva'])
                    </div>
                    <div class="mb-4">
                        <label for="measurement_unit_id" class="block mb-2 font-bold text-gray-700 dark:text-white">Unidad
                            de Medida</label>
                        <div class="relative">
                            <select wire:model.lazy="measurement_unit_id"
                                class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                                id="measurement_unit_id">
                                @foreach ($measurement_units as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('partials.message', ['input' => 'measurement_unit_id'])
                    </div>
                    <!-- Agregar selección de tipo de producto -->
                    <div class="mb-4">
                        <label for="product_category_id" class="block mb-2 font-bold text-gray-700 dark:text-white">Categoría del Producto</label>
                        <div class="relative">
                            <select wire:model.lazy="product_category_id"
                                class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                                id="product_category_id">
                                @foreach ($product_categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('partials.message', ['input' => 'product_category_id'])
                    </div>

                    <div class="mb-4">
                        <label for="product_subcategory_id" class="block mb-2 font-bold text-gray-700 dark:text-white">Subcategoría del Producto</label>
                        <div class="relative flex items-center">
                            <select wire:model.lazy="product_subcategory_id"
                                class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                                id="product_subcategory_id">
                                @foreach ($product_subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                            <div class="flex items-center ml-2 -mt-2">
                                <button type="button" wire:click="redirectToCreateSubcategory" class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @include('partials.message', ['input' => 'product_subcategory_id'])
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="block mb-2 font-bold text-gray-700 dark:text-white">Cantidad</label>
                        <input type="number" id="quantity" name="quantity" wire:model="quantity"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'quantity'])
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block mb-2 font-bold text-gray-700 dark:text-white">Precio</label>
                        <input type="number" id="price" name="price" wire:model="price" step="any"
                            class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'price'])
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block mb-2 font-bold text-gray-700 dark:text-white">Imagen del Producto</label>

                        @if ($image)
                            <div class="mt-4">
                                <span class="block mb-2 text-gray-700 dark:text-white">Vista previa:</span>
                                <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover rounded-lg mb-4">
                            </div>
                        @endif

                        @include('partials.message', ['input' => 'image'])

                        <div class="flex justify-center">
                            <label class="flex flex-col items-center justify-center w-16 h-16 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span class="mt-1 text-xs text-gray-600 dark:text-gray-400">Subir</span>
                                <input type="file" id="image" wire:model="image" class="hidden">
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="px-4 py-2 text-m font-bold text-white bg-blue-400 rounded-lg hover:bg-blue-500 focus:outline-none focus:shadow-outline">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
