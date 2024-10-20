<div>
    <h1>livewire.auth.dashboard</h1>
    {{-- @include('partials.botonesDashboard')
    
    @include('partials.createForm')
    
    @include('partials.editForm')
    
    @include('partials.tableExample') --}}
    {{-- 
    <nav class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
        <div class="flex flex-wrap items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                    aria-controls="drawer-navigation"
                    class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Toggle sidebar</span>
                </button>
                
                <!-- Logo para modo claro -->
                <a href="/dashboard" class="flex items-center justify-between mr-4 ">
                    <img src="../../dbeef.png"
                        class=" pl-5 mr-3 h-14 block dark:hidden" alt="Logo" />
                </a>
                
                <!-- Logo para modo oscuro -->
                <a href="/dashboard" class="flex items-center justify-between mr-4 ">
                    <img src="../../dbeef.png"
                        class="mr-3 h-14 hidden dark:block" alt="Logo" />
                </a>
            </div>
            <div class="flex items-center lg:order-2">
                <!-- Botón para cambiar de tema -->
                <button id="theme-toggle" class="mr-4 p-2 rounded-full bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-700">
                    <span id="theme-toggle-light-icon">🌞</span>
                    <span id="theme-toggle-dark-icon" class="hidden">🌙</span>
                </button>

                <button type="button"
                    class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full"
                        src="https://i.pinimg.com/originals/61/f7/5e/61f75ea9a680def2ed1c6929fe75aeee.jpg"
                        alt="user photo" />
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden w-56 my-4 text-base list-none bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                    id="dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 truncate dark:text-white">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Perfil</a>
                        </li>

                    </ul>

                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block w-full px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cerrar
                                    sesión</button>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <h1 class="text-3xl font-bold">Dashboard</h1>    
    --}}
</div>
