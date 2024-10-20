<div class="p-4 max-w-4xl mx-auto flex flex-col md:flex-row my-16 min-h-[70vh]">
    @if ($product->status_id === 4)
    <div class="flex-1">
        <div class="bg-white rounded-md">
            <img src="{{ $product->image_path ? Storage::url($product->image_path) : asset('default-image.jpg') }}"
                alt="{{ $product->name }}" class="w-full h-1/3 object-cover rounded-md shadow-xl">
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <!-- Imagenes extras -->
        </div>
    </div>

    <div class="flex-1 mt-8 md:mt-0 md:ml-8">
        <h2 class="text-2xl font-bold mb-2">{{ $product->name }}</h2>
        <p class="text-xl font-semibold text-gray-700">${{ number_format($product->price->price, 2) }}</p>
        <div class="mt-4">
            <label for="piezas" class="block text-md font-medium text-gray-700">Selecciona la cantidad de piezas:</label>
            @if ($product->inventory->quantity > 0)
                <select wire:model="quantity" id="piezas" name="piezas"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    @for ($i = 1; $i <=  $product->inventory->quantity; $i++)
                        <option value="{{ $i }}">{{ $i }} pieza{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            @else
                <p class="mt-1 block w-full py-2 text-base text-orange-600 sm:text-sm">Producto agotado</p>
            @endif
        </div>
        <div class="mt-4 flex items-start space-x-2 text-yellow-500">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                <path d="M12 17V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                <circle cx="12" cy="8" r="1" fill="currentColor"></circle>
                <path
                    d="M7 3.338C8.471 2.487 10.179 2 12 2 17.523 2 22 6.477 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12c0-1.821.487-3.529 1.338-5"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            </svg>
            <p class="text-sm">El costo de los productos pueden variariar ligeramente seg煤n su peso.</p>
        </div>

        <div class="mt-4">
            <button wire:click="sendMessageToWhatsApp"
                class="w-full bg-green-500 text-white py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 flex items-center justify-center">
                <svg class="w-6 h-6 mr-2" fill="#ffffff" viewBox="0 0 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M26.576 5.363c-2.69-2.69-6.406-4.354-10.511-4.354-8.209 0-14.865 6.655-14.865 14.865 0 2.732 0.737 5.291 2.022 7.491l-0.038-0.07-2.109 7.702 7.879-2.067c2.051 1.139 4.498 1.809 7.102 1.809h0.006c8.209-0.003 14.862-6.659 14.862-14.868 0-4.103-1.662-7.817-4.349-10.507l0 0zM16.062 28.228h-0.005c-0 0-0.001 0-0.001 0-2.319 0-4.489-0.64-6.342-1.753l0.056 0.031-0.451-0.267-4.675 1.227 1.247-4.559-0.294-0.467c-1.185-1.862-1.889-4.131-1.889-6.565 0-6.822 5.531-12.353 12.353-12.353s12.353 5.531 12.353 12.353c0 6.822-5.53 12.353-12.353 12.353h-0zM22.838 18.977c-0.371-0.186-2.197-1.083-2.537-1.208-0.341-0.124-0.589-0.185-0.837 0.187-0.246 0.371-0.958 1.207-1.175 1.455-0.216 0.249-0.434 0.279-0.805 0.094-1.15-0.466-2.138-1.087-2.997-1.852l0.01 0.009c-0.799-0.74-1.484-1.587-2.037-2.521l-0.028-0.052c-0.216-0.371-0.023-0.572 0.162-0.757 0.167-0.166 0.372-0.434 0.557-0.65 0.146-0.179 0.271-0.384 0.366-0.604l0.006-0.017c0.043-0.087 0.068-0.188 0.068-0.296 0-0.131-0.037-0.253-0.101-0.357l0.002 0.003c-0.094-0.186-0.836-2.014-1.145-2.758-0.302-0.724-0.609-0.625-0.836-0.637-0.216-0.01-0.464-0.012-0.712-0.012-0.395 0.01-0.746 0.188-0.988 0.463l-0.001 0.002c-0.802 0.761-1.3 1.834-1.3 3.023 0 0.026 0 0.053 0.001 0.079l-0-0.004c0.131 1.467 0.681 2.784 1.527 3.857l-0.012-0.015c1.604 2.379 3.742 4.282 6.251 5.564l0.094 0.043c0.548 0.248 1.25 0.513 1.968 0.74l0.149 0.041c0.442 0.14 0.951 0.221 1.479 0.221 0.303 0 0.601-0.027 0.889-0.078l-0.031 0.004c1.069-0.223 1.956-0.868 2.497-1.749l0.009-0.017c0.165-0.366 0.261-0.793 0.261-1.242 0-0.185-0.016-0.366-0.047-0.542l0.003 0.019c-0.092-0.155-0.34-0.247-0.712-0.434z">
                        </path>
                    </g>
                </svg>
                Comprar por WhatsApp
            </button>
        </div>
        <div class="mt-4">
            <p class="text-gray-700"><strong>Descripci贸n:</strong> {{ $product->description }}</p>
        </div>
        <div class="mt-4 flex items-center">
            <svg class="w-6 h-6 mr-2" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" stroke-width="3"
                stroke="#000000" fill="none">
                <path
                    d="M45.41,11.16l.86,2.61a3.75,3.75,0,0,0,1.5,2L50,17.21a3.85,3.85,0,0,1,1.43,4.62l-.84,2.09a3.83,3.83,0,0,0,0,2.88l.83,2a3.83,3.83,0,0,1-1.32,4.58L48.13,34.8a3.86,3.86,0,0,0-1.46,2.08L46,39.32a3.84,3.84,0,0,1-4,2.78l-2.1-.18a3.88,3.88,0,0,0-2.74.84l-2,1.63a3.83,3.83,0,0,1-4.85,0L28.54,43a3.85,3.85,0,0,0-2.45-.88H23a3.83,3.83,0,0,1-3.74-3l-.55-2.35a3.82,3.82,0,0,0-1.58-2.31L15.3,33.19a3.84,3.84,0,0,1-1.45-4.48l.86-2.36a3.86,3.86,0,0,0,0-2.66l-.77-2.06a3.86,3.86,0,0,1,1.51-4.58l2-1.31a3.87,3.87,0,0,0,1.61-2.19l.61-2.18a3.85,3.85,0,0,1,4-2.79l1.93.17a3.88,3.88,0,0,0,2.74-.84l1.83-1.48a3.84,3.84,0,0,1,4.87,0L36.7,7.81a3.82,3.82,0,0,0,2.75.88l2-.15A3.84,3.84,0,0,1,45.41,11.16Z" />
                <path
                    d="M44.59,41.57l7,12.21c.18.31,0,.64-.23.55l-8.61-3.5a.24.24,0,0,0-.31.19l-1.06,9c-.06.29-.42.25-.6-.06L32.65,45.25"
                    stroke-linecap="round" />
                <path
                    d="M32.65,45.25,25.14,60c-.19.31-.53.35-.6.07l-1.27-9.2a.24.24,0,0,0-.31-.18L14.59,54.3c-.28.08-.43-.24-.24-.56l7-12.17"
                    stroke-linecap="round" />
                <path
                    d="M32.74,16.89l2.7,5.49a.1.1,0,0,0,.08.05l6,.88c.08,0,.12.12.06.17l-4.38,4.27a.09.09,0,0,0,0,.09l1,6a.1.1,0,0,1-.14.11l-5.42-2.85a.07.07,0,0,0-.09,0L27.19,34a.11.11,0,0,1-.15-.11l1-6a.1.1,0,0,0,0-.09l-4.39-4.27a.11.11,0,0,1,.06-.17l6.05-.88a.09.09,0,0,0,.08-.05l2.71-5.49A.1.1,0,0,1,32.74,16.89Z"
                    stroke-linecap="round" />
            </svg>
            <span class="text-gray-700 font-medium">Calidad</span>
        </div>
    </div>
        @else
    <div class="flex flex-col items-center justify-center flex-1 mt-8 md:mt-0 md:ml-8">
        <h1 class="text-8xl font-semibold text-gray-700 mb-4">¡Oops!</h1>
        <p class="text-xl font-semibold text-gray-700">El producto no se encuentra disponible por el momento.</p>
        <a href="/productos"
            class="bg-[#F1861E] text-white px-12 py-2 mt-4 rounded-lg font-semibold inline-block  hover:scale-105 transform transition duration-300">
            Ver más productos.
        </a>
    </div>
    @endif
</div>
