<div> 
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

    <div class="container max-w-xl min-h-screen px-4 py-8 mx-auto">
        <div class="mx-auto bg-white rounded-lg shadow-xl overflow-scrollflow-hidden dark:bg-gray-700">
            <div class="px-8 py-6">
                <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">Agregar Usuario</h2>
                <form wire:submit.prevent="store" class="space-y-4">
                    <div class="mb-4">
                        <label for="names" class="block mb-2 font-bold text-gray-700 dark:text-white">Nombres</label>
                        <input wire:model.lazy="names" id="names"
                            class="block w-full px-4 py-3 mb-2 text-sm text-gray-700 placeholder-gray-500 bg-gray-50 border border-gray-300 rounded-lg dark:text-gray-300 dark:border-gray-700 dark:bg-gray-800"
                            type="text" placeholder="Juan Antonio">
                        @include('partials.message', ['input' => 'names'])
                    </div>
                    <div class="mb-4">
                        <label for="surnames"
                            class="block mb-2 font-bold text-gray-700 dark:text-white">Apellidos</label>
                        <input wire:model.lazy="surnames" id="surnames"
                            class="block w-full px-4 py-3 mb-2 text-sm text-gray-700 placeholder-gray-500 bg-gray-50 border border-gray-300 rounded-lg dark:text-gray-300 dark:border-gray-700 dark:bg-gray-800"
                            type="text" placeholder="Perez Lopez">
                        @include('partials.message', ['input' => 'surnames'])
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 font-bold text-gray-700 dark:text-white">Correo</label>
                        <input wire:model.lazy="email" id="email"
                            class="block w-full px-4 py-3 mb-2 text-sm text-gray-700 placeholder-gray-500 bg-gray-50 border border-gray-300 rounded-lg dark:text-gray-300 dark:border-gray-700 dark:bg-gray-800"
                            type="email" placeholder="test@test.com">
                        @include('partials.message', ['input' => 'email'])
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300" for="roleId">Rol
                            @include('partials.required')
                        </label>
                        <div class="relative">
                            <select wire:model.lazy="roleId"
                                class="block w-full px-4 py-3 mb-2 text-sm text-gray-700 placeholder-gray-500 bg-gray-50 border border-gray-300 rounded-lg appearance-none dark:text-gray-300 dark:border-gray-700 dark:bg-gray-800"
                                id="roleId">
                                <option value="">Seleccione un rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('partials.message', ['input' => 'roleId'])
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="px-4 py-2 text-m font-bold text-white  bg-blue-400 rounded-lg hover:bg-blue-500 focus:outline-none focus:shadow-outline">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>