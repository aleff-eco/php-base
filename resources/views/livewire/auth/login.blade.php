<div class="flex items-center justify-center w-full h-screen dark:bg-gray-950">
    <div class="flex flex-wrap w-full text-slate-800 h-full">
        <!-- Carrusel de imágenes en el lado izquierdo -->
        <div class="relative flex-col justify-center hidden object-center h-screen text-center bg-blue-600 select-none md:flex md:w-1/2">
            <div class="relative w-full h-full overflow-hidden">
                <!-- Contenedor de imágenes del carrusel -->
                <div class="carousel relative w-full h-full">
                    <!-- Imagen 1 -->
                    <div class="slide absolute inset-0 w-full h-full opacity-100 transition-opacity duration-1000">
                        <img class="object-cover w-full h-full" src="https://picsum.photos/1920/1080?random=1" alt="Imagen 1">
                    </div>
                    <!-- Imagen 2 -->
                    <div class="slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-1000">
                        <img class="object-cover w-full h-full" src="https://picsum.photos/1920/1080?random=2" alt="Imagen 2">
                    </div>
                    <!-- Imagen 3 -->
                    <div class="slide absolute inset-0 w-full h-full opacity-0 transition-opacity duration-1000">
                        <img class="object-cover w-full h-full" src="https://picsum.photos/1920/1080?random=3" alt="Imagen 3">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-full h-full md:w-1/2 justify-center items-center py-12">
            <div class="flex justify-center ">
                <a href="#" class="text-2xl font-bold text-blue-600">
                    <img class="h-32 mx-auto" src="./storage/logos/logos-dbeefmax-02.png" alt="Logo">
                </a>
            </div>

            <!-- Formulario -->
            <div class="max-w-md w-full bg-white p-8 rounded-lg dark:bg-gray-900">
                <p class="text-3xl font-bold text-center dark:text-white md:leading-tight mb-6">Bienvenido de regreso</p>

                <div class="relative flex h-px bg-gray-200 place-items-center mb-8">
                    <div class="absolute h-6 px-4 text-sm text-center text-gray-500 -translate-x-1/2 bg-white left-1/2">
                        Ingrese sus credenciales
                    </div>
                </div>
                <form wire:submit.prevent="login" class="flex flex-col items-stretch">
                    <div class="flex flex-col mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Correo electrónico</label>
                        <input type="email" id="email" wire:model="email" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="correo@email.com" required>
                        @include('partials.message', ['input' => 'email'])
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Contraseña</label>
                        <div class="relative">
                            <input type="password" id="password" wire:model="password" class="w-full px-4 py-2 border border-gray-300 rounded-md password-input focus:outline-none focus:border-blue-400" placeholder="Contraseña" autocomplete="new-password" inputmode="none">
                            <span id="toggle-password" class="absolute transform -translate-y-1/2 cursor-pointer top-1/2 right-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        @include('partials.message', ['input' => 'password'])
                        <a href="{{ route('forget.password') }}" class="pt-6 text-gray-600 dark:text-white text-md hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">¿Olvidaste tu contraseña? Click aquí</a>
                    </div>

                    <button type="submit" class="px-4 py-2 mt-6 text-base font-semibold text-center text-white transition bg-blue-600 rounded-lg shadow-md outline-none ring-blue-500 ring-offset-2 hover:bg-blue-700 focus:ring-2 w-full">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para ver la contraseña -->
<script>
    const togglePassword = document.querySelector('#toggle-password');
    const passwordInput = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        // Toggle el tipo del input entre "password" y "text"
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Cambia el ícono del ojo
        this.innerHTML = type === 'password'
            ? `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                   <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                   <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
               </svg>`
            : `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                   <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                   <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                   <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
               </svg>`;
    });
</script>
