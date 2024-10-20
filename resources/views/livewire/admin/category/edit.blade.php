<div>
    <a href="{{ route('categories.index') }}">
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
                <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">Agregar Categoría</h2>
                <form wire:submit.prevent="update" class="space-y-4">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 font-bold text-gray-700 dark:text-white">Nombre de la Categoría</label>
                        <input type="text" id="name" name="name" wire:model="name" class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'name'])
                    </div>
                    <div class="mb-4">
                        <label for="code" class="block mb-2 font-bold text-gray-700 dark:text-white">Código</label>
                        <input type="text" id="code" name="code" wire:model="code" class="w-full px-4 py-3 border border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white">
                        @include('partials.message', ['input' => 'code'])
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="new_image">Imagen</label>
                        
                        {{-- Mostrar la imagen actual de la categoría --}}
                        @if($image)
                            <div class="mb-4">
                                <img id="current-image" src="{{ Storage::url($image) }}" alt="{{ $name }}" class="w-full h-full object-cover rounded-lg">
                            </div>
                        @endif
                    
                        <div class="flex justify-end">
                            <label class="relative cursor-pointer px-4 py-2 bg-blue-400 text-white font-bold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                Seleccionar Imagen
                                <!-- Se añade wire:model para que Livewire maneje el archivo correctamente -->
                                <input type="file" id="new_image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" wire:model="newImage">
                            </label>
                        </div>
                    
                        {{-- Vista previa de la nueva imagen si se ha cargado --}}
                        @if ($newImage)
                            <div id="image-preview" class="mt-4">
                                <img id="preview-img" src="{{ $newImage->temporaryUrl() }}" class="w-full h-full object-cover rounded-lg">
                            </div>
                        @endif
                    
                        @error('newImage') 
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="color" class="block mb-2 font-bold text-gray-700 dark:text-white">Color de la Categoría</label>
                        <div class="flex justify-center">
                            <input type="color" id="color" wire:model="color" class="w-32 h-24 cursor-pointer border-none rounded-md" style="background: linear-gradient(to right, #ff0000, #ffff00, #00ff00, #00ffff, #0000ff, #ff00ff);">
                        </div>
                        <span class="block mt-2 text-xs text-gray-600 dark:text-gray-400">Seleccione un color de la categoría</span>
                        @include('partials.message', ['input' => 'color'])
                    </div>       
                    <div class="flex items-center justify-between">
                        <button type="submit" class="px-4 py-2 text-m font-bold text-white bg-blue-400 rounded-lg hover:bg-blue-500 focus:outline-none focus:shadow-outline">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
