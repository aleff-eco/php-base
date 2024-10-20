<div>
    <a href="{{ route('users.index') }}">
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
    <form wire:submit.prevent="update"
        class="max-w-3xl min-h-screen mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-gray-900 w-9/12">
        <div class="container px-4 mx-auto"></div>

        <div class="grid w-full gap-4 mb-6 md:grid-cols-2">
            <div> <label class="block mb-2 text-sm font-medium dark:text-gray-400" for="names">Nombres
                    @include('partials.required')
                </label>
                <input wire:model.lazy="names" id="names"
                    class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                    type="text" name="" placeholder="Juan Antonio">
                @include('partials.message', ['input' => 'names'])
            </div>
            <div> <label class="block mb-2 text-sm font-medium dark:text-gray-400" for="surnames">Apellidos
                    @include('partials.required')
                </label>
                <input wire:model.lazy="surnames" id="surnames"
                    class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                    type="text" name="" placeholder="Perez Lopez">
                @include('partials.message', ['input' => 'surnames'])
            </div>
        </div>
        <div class="grid w-full gap-4 mb-6 md:grid-cols-2">
            <div> <label class="block mb-2 text-sm font-medium dark:text-gray-400" for="email">Correo
                    @include('partials.required')
                </label>
                <input wire:model.lazy="email" id="email"
                    class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                    type="text" name="" placeholder="test@test.com">
                @include('partials.message', ['input' => 'email'])
            </div>
            <div> <label class="block mb-2 text-sm font-medium dark:text-gray-400" for="roleId">Rol
                    @include('partials.required')
                </label>
                <div class="relative">
                    <select wire:model.lazy="roleId"
                        class="block w-full px-4 py-3 mb-2 text-sm placeholder-gray-500 bg-white border rounded appearance-none dark:text-gray-400 dark:border-gray-900 dark:bg-gray-800"
                        id="roleId">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>
                </div>
                @include('partials.message', ['input' => 'roleId'])
            </div>
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-bold text-gray-700 dark:text-white" for="status_id">
                Estado
            </label>
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
        <div class="mt-7">
            <div class="flex justify-start space-x-2">
                <button type="submit"
                    class="inline-block px-4 py-2 text-m font-medium leading-tight rounded-lg text-white bg-blue-500 shadow-md hover:bg-blue-600">Guardar</button>

            </div>
        </div>
        {{-- @include('partials.error-alert') --}}
    </form>
</div>
