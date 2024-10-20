<div>
    <div class="flex flex-wrap w-screen text-gray-900">
        <div
            class="relative flex-col justify-center hidden h-screen text-center bg-red-600 select-none md:flex md:w-1/2">

            <img class="object-cover w-11/12 max-w-lg mx-auto rounded-lg"
                src="#" />
            <p class="mt-5 text-xl text-white font-bold">APP</p>
        </div>
        <div class="flex flex-col w-full bg-red-600 lg:bg-white md:w-1/2">
            <div class="my-auto mx-auto flex flex-col justify-center px-6 pt-8 md:justify-start lg:w-[33rem]">
                <img class="object-cover w-11/12 max-w-lg mx-auto rounded-lg lg:hidden lg:col-span-2"
                    src="#" />
                <p class="text-3xl font-bold text-center text-white lg:text-red-600 md:text-left md:leading-tight">Crea
                    tu cuenta</p>
                <p class="mt-6 font-medium text-center text-white lg:text-gray-700 md:text-left">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}"
                        class="font-semibold text-white underline lg:text-red-600 whitespace-nowrap">Inicia sesión</a>
                </p>
                <form class="grid items-stretch grid-cols-1 gap-4 pt-3 lg:grid-cols-2 md:pt-8" wire:submit="save">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="primer-nombre">
                            Nombre
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="names" type="text" placeholder="Nombre" wire:model="names">
                            @include('partials.message', ['input' => 'names'])
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="segundo-nombre">
                            Apellidos
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="surnames" type="text" placeholder="Apellidos" wire:model="surnames">
                            @include('partials.message', ['input' => 'surnames'])
                    </div>
                    {{-- <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="primer-apellido">
                            Primer Apellido
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="primer-apellido" type="text" placeholder="Primer Apellido" wire:model="first_surname">
                            @include('partials.message', ['input' => 'first_surname'])
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="segundo-apellido">
                            Segundo Apellido
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="segundo-apellido" type="text" placeholder="Segundo Apellido" wire:model="second_surname">
                            @include('partials.message', ['input' => 'second_surname'])
                    </div> --}}
                    {{-- <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="telefono">
                            Teléfono
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="telefono" type="text" placeholder="Teléfono" wire:model="phone">
                            @include('partials.message', ['input' => 'phone'])
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="fecha-nacimiento">
                            Fecha de Nacimiento
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="fecha-nacimiento" type="date" wire:model="birth_date">
                            @include('partials.message', ['input' => 'birth_date'])
                    </div> --}}
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-white lg:text-gray-700" for="email">
                            Correo Electrónico 
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-900 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email" type="email" placeholder="correo electronico" wire:model="email">
                            @include('partials.message', ['input' => 'email'])
                    </div>
                    <div class="flex justify-end lg:col-span-2">
                        <button
                            class="px-4 py-2 font-bold text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline"
                            type="submit">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
