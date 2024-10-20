<div class="h-full mb-4 rounded-lg shadow-xl dark:-gray-600">
    <div class="container px-4 py-8 mx-auto">
        <div class="mx-auto overflow-hidden bg-white rounded-lg dark:bg-gray-700 ">
            <div class="px-6 py-4">
                <h2 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white">Agregar Precio del Producto</h2>
                {{-- <p class="mb-4 text-gray-600 dark:text-white">Crear nuevo item</p> --}}
                <form wire:submit="save">
                    <label for="code" class="block mb-2 font-semibold text-gray-700 dark:text-white">Nombre del
                        Producto: {{ $product->name }}</label>
                    <label for="code" class="block mb-2 font-semibold text-gray-700 dark:text-white">Descripción: {{ $product->description }}</label>
                    <label for="code" class="block mb-2 font-semibold text-gray-700 dark:text-white">Cantidad: {{ $product->quantity }}</label>
                    <label for="code" class="block mb-2 font-semibold text-gray-700 dark:text-white">Precio Actual: {{ $product->price }}</label>

                    <div class="mb-4">
                        <label for="price"
                            class="block mb-2 font-semibold text-gray-700 dark:text-white">Nuevo Precio</label>
                        <input type="number" id="price" name="price" wire:model="price"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" step="any">
                        @include('partials.message', ['input' => 'price'])
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
