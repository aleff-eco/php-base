<form wire:submit.prevent="update" class="max-w-3xl min-h-screen mx-auto p-6 bg-white rounded-lg shadow-md dark:bg-gray-900 w-9/12">
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
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-500 pointer-events-none">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path d="M5 6l5 5 5-5z" />
                </svg>
            </div>
        </div>
        @include('partials.message', ['input' => 'status_id'])
    </div>
    <div class="mt-7">
        <div class="flex justify-start space-x-2">
            <button type="submit"
                class="inline-block px-4 py-2 text-m font-medium leading-tight rounded-lg text-white bg-blue-500 shadow-md hover:bg-blue-600">Guardar</button>
            <a href="{{ route('users.index') }}"
                class="px-6 py-3 text-sm font-medium leading-tight text-blue-600 bg-blue-100 rounded-lg hover:bg-blue-200 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Regresar</a>
        </div>
    </div>
    {{-- @include('partials.error-alert') --}}
</form>
