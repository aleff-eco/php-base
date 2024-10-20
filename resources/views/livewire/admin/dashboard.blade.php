{{-- <div>
    <h1>livewire.auth.dashboard</h1>
     @include('partials.botonesDashboard')

    @include('partials.createForm')

    @include('partials.editForm')

    @include('partials.tableExample') --}}

{{-- ADMIN DASHBOARD --}}

<div class="container mx-auto pt-8">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-14 md:grid-cols-2 lg:grid-cols-2">
            <a href="/" class="w-full h-full flex items-center justify-center">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-8 px-12 rounded-lg w-full h-full flex flex-col items-center justify-center">
                    <svg aria-hidden="true" class="w-12 h-12 text-white mb-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-lg">Páginas</span>
                    <span class="text-sm text-gray-200 mt-1">Ver las páginas visibles para clientes</span>
                </button>
            </a>
            <a href="/users" class="w-full h-full flex items-center justify-center">
                <button
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-8 px-12 rounded-lg w-full h-full flex flex-col items-center justify-center">
                    <svg aria-hidden="true" class="w-12 h-12 text-white mb-2" fill="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                    <span class="text-lg">Usuarios</span>
                    <span class="text-sm text-gray-200 mt-1">Administrar usuarios del sistema</span>
                </button>
            </a>
            <a href="/products" class="w-full h-full flex items-center justify-center">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-8 px-12 rounded-lg w-full h-full flex flex-col items-center justify-center">
                    <svg aria-hidden="true" class="w-12 h-12 text-white mb-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-lg">Productos</span>
                    <span class="text-sm text-gray-200 mt-1">Gestionar productos disponibles</span>
                </button>
            </a>
            <a href="/categories" class="w-full h-full flex items-center justify-center">
                <button
                    class="bg-orange-400 hover:bg-orange-500 text-white font-bold py-8 px-12 rounded-lg w-full h-full flex flex-col items-center justify-center">
                    <svg fill="#FFFFFF" viewBox="0 0 64 64" class="w-12 h-12 mb-2" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.89,30.496c-1.14,1.122 -1.784,2.653 -1.791,4.252c-0.006,1.599 0.627,3.135 1.758,4.266c3.028,3.028 7.071,7.071 10.081,10.082c2.327,2.326 6.093,2.349 8.448,0.051c5.91,-5.768 16.235,-15.846 19.334,-18.871c0.578,-0.564 0.905,-1.338 0.905,-2.146c0,-4.228 0,-17.607 0,-17.607l-17.22,0c-0.788,0 -1.544,0.309 -2.105,0.862c-3.065,3.018 -13.447,13.239 -19.41,19.111Zm34.735,-15.973l0,11.945c0,0.811 -0.329,1.587 -0.91,2.152c-3.069,2.981 -13.093,12.718 -17.485,16.984c-1.161,1.127 -3.012,1.114 -4.157,-0.031c-2.387,-2.386 -6.296,-6.296 -8.709,-8.709c-0.562,-0.562 -0.876,-1.325 -0.872,-2.12c0.003,-0.795 0.324,-1.555 0.892,-2.112c4.455,-4.373 14.545,-14.278 17.573,-17.25c0.561,-0.551 1.316,-0.859 2.102,-0.859c3.202,0 11.566,0 11.566,0Zm-7.907,2.462c-1.751,0.015 -3.45,1.017 -4.266,2.553c-0.708,1.331 -0.75,2.987 -0.118,4.356c0.836,1.812 2.851,3.021 4.882,2.809c2.042,-0.212 3.899,-1.835 4.304,-3.896c0.296,-1.503 -0.162,-3.136 -1.213,-4.251c-0.899,-0.953 -2.18,-1.548 -3.495,-1.57c-0.031,-0.001 -0.062,-0.001 -0.094,-0.001Zm0.008,2.519c1.105,0.007 2.142,0.849 2.343,1.961c0.069,0.384 0.043,0.786 -0.09,1.154c-0.393,1.079 -1.62,1.811 -2.764,1.536c-1.139,-0.274 -1.997,-1.489 -1.802,-2.67c0.177,-1.069 1.146,-1.963 2.27,-1.981c0.014,0 0.029,0 0.043,0Z">
                        </path>
                    </svg>
                    <span class="text-lg">Categorías</span>
                    <span class="text-sm text-gray-200 mt-1">Gestionar y crear categorías de productos</span>
                </button>
            </a>
        </div>
    </div>
</div>
