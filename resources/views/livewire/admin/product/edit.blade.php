<div class="min-h-screen">
    <a href="{{ route('products.index') }}">
        <button type="button"
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
    <form wire:submit.prevent="save"
        class="w-full max-w-xl px-8 pt-6 pb-8 mx-auto mb-4 bg-white rounded shadow-md dark:bg-gray-700">
        <div class="mb-4">
            <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">Editar Producto</h2>
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="name">Nombre del Producto</label>
            <input
                class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                id="name" type="text" placeholder="Nombre del Producto" wire:model="name">
            @include('partials.message', ['input' => 'name'])
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="description">Descripción</label>
            <input
                class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                id="description" type="text" placeholder="Descripción" wire:model="description">
            @include('partials.message', ['input' => 'description'])
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="code">Clave</label>
            <input
                class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                id="code" type="text" placeholder="Clave" wire:model="code">
            @include('partials.message', ['input' => 'code'])
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="iva">IVA</label>
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
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="measurement_unit_id">Unidad de
                Medida</label>
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
            <label for="product_category_id" class="block mb-2 font-bold text-gray-700 dark:text-white">Tipo de
                Producto</label>
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
            <label for="product_subcategory_id" class="block mb-2 font-bold text-gray-700 dark:text-white">Categoría de
                Producto</label>
            <div class="relative">
                <select wire:model.lazy="product_subcategory_id"
                    class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                    id="product_subcategory_id">
                    @foreach ($product_subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            @include('partials.message', ['input' => 'product_subcategory_id'])
        </div>
        <div class="mb-4">
            <label for="price" class="block mb-2 font-bold text-gray-700 dark:text-white">Precio</label>
            <input type="number" id="price" name="price" wire:model="price" step="any"
                class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
            @include('partials.message', ['input' => 'price'])
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="status_id">Estado</label>
            <div class="relative">
                <select wire:model.lazy="status_id"
                    class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                    id="status_id">
                    @foreach ($status as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
            @include('partials.message', ['input' => 'status_id'])
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="new_image">Imagen</label>
            @if($product->image_path)
                <div class="mb-4">
                    <img id="current-image" src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-lg">
                </div>
            @endif
        
            <div class="flex justify-end">
                <label class="relative cursor-pointer px-4 py-2 bg-blue-400 text-white font-bold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Seleccionar Imagen
                    <input type="file" id="new_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" wire:model="newImage"> 
                    <!-- wire:model es lo que hace que se visualice-->
                </label>
            </div>
        
            @if ($newImage)
                <div id="image-preview" class="mt-4">
                    <img id="preview-img" src="{{ $newImage->temporaryUrl() }}" class="w-full h-full object-cover rounded-lg">
                </div>
            @endif
        
            @error('newImage') 
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>        
        
        <div class="flex items-center justify-between">
            <button type="submit"
                class="px-4 py-2 text-xl font-bold text-white  bg-blue-400 rounded-lg hover:bg-blue-500 focus:outline-none focus:shadow-outline">
                Guardar
            </button>
        </div>
    </form>
</div>

