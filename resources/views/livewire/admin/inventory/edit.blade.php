<div class="min-h-screen mb-4 rounded-lg dark:-gray-600">
    <a href="{{ route('products.index') }}">
        <button type="button""
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
    <div class="grid grid-cols-1 gap-3">
        <div class="container max-w-lg px-4 py-1 mx-auto shadow-lg rounded-xl">
            <div class="w-full max-w-2xl p-8 bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                <h3 class="mb-4 text-3xl font-semibold text-center text-gray-800 dark:text-white">
                    Agregar / Disminuir Inventario
                </h3>
                <div class="px-3 py-3">    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-md font-semibold text-gray-700 dark:text-white">
                                Producto: 
                                <span class="text-gray-800 dark:text-gray-300">{{ $product->name }}</span>
                            </label>
                        </div>
    
                        <div>
                            <label class="block text-md font-semibold text-gray-700 dark:text-white">
                                Inventario actual:
                                <span class="text-gray-600 dark:text-gray-300">{{ $product->inventory->quantity ?? 'N/A' }}</span>
                            </label>
                        </div>
    
                        <div>
                            <label class="block text-md font-semibold text-gray-700 dark:text-white">
                                Precio actual: 
                                <span class="text-gray-600 dark:text-gray-300">{{ $product->price->price }}</span>
                            </label>
                        </div>
                    </div>
    
                    @if ($inventory_type_id == 1 || $inventory_type_id == 2)
                    <form wire:submit.prevent="save" class="space-y-6 mt-6">
                        <div>
                            <label for="quantity" class="block text-lg font-medium text-gray-700 dark:text-white">Cantidad de productos</label>
                            <input type="number" id="quantity" name="quantity" min="1" wire:model="quantity" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                                style="border-color: {{ $inventory_type_id == 1 ? 'green' : 'red' }};">
                        </div>
    
                        <div class="flex justify-center gap-4">
                            <button type="button" wire:click="$set('inventory_type_id', 1)" 
                                class="px-8 py-2 text-md text-white font-medium bg-green-500 rounded-lg hover:bg-green-600 focus:bg-green-700 focus:outline-none 
                                @if($inventory_type_id == 1) focus:ring-2 focus:ring-green-700 
                                @elseif($inventory_type_id == 2 || is_null($inventory_type_id)) bg-gray-400 
                                @endif">
                                Añadir
                            </button>
    
                            <button type="button" wire:click="$set('inventory_type_id', 2)" 
                                class="px-5 py-2 text-md text-white font-medium bg-red-500 rounded-lg hover:bg-red-600 focus:bg-red-700 focus:outline-none 
                                @if($inventory_type_id == 2) focus:ring-2 focus:ring-red-700 
                                @elseif($inventory_type_id == 1 || is_null($inventory_type_id)) bg-gray-400 
                                @endif">
                                Disminuir
                            </button>
                        </div>
    
                        <div>
                            <label class="block text-lg font-medium text-gray-700 dark:text-white">Inventario tras el cambio</label>
                            <p class="text-gray-600 dark:text-gray-300">
                                @if($inventory_type_id == 1)
                                    {{ ($product->inventory->quantity ?? 0) + $quantity }}
                                @elseif($inventory_type_id == 2)
                                    {{ max(($product->inventory->quantity ?? 0) - $quantity, 0) }}
                                @endif
                            </p>
                        </div>
    
                        <div class="flex justify-center ">
                            <button type="submit" id="submitBtn" 
                                class="px-6 py-2 text-md font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:bg-blue-700 focus:outline-none">
                                Guardar
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
