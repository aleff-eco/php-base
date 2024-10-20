<div>
    <div class="flex items-center justify-center h-screen ">
        <div class="max-w-md max-h-full p-8 mx-auto my-auto bg-white rounded shadow-md dark:bg-gray-900">
            {{-- @include('partials.error-alert') --}}
            <div class="max-w-md px-8 py-6 bg-white rounded-lg shadow-md dark:bg-gray-900 ">
                {{-- <div class="flex justify-center mb-4">
                    <img src="{{ asset(config('app.path_img').'logo.png') }}" alt="logo"  class="object-cover w-32 h-16" />
                </div> --}}
                <h1 class="mb-4 text-2xl font-bold text-center dark:text-gray-200">Recuperar Contraseña</h1>
                @include('partials.required-fields')
                <form wire:submit.prevent="store">
                    <div class="mb-4">
                        <label for="email"
                        class="text-lg font-medium text-gray-700 dark:text-gray-400">Correo: @include('partials.required')</label>
                    <input wire:model="email" type="text" id="email"
                        class="w-full px-4 py-3 mt-3 bg-gray-200 rounded-lg dark:text-gray-400 dark:bg-gray-800 "
                        name="email" placeholder="Ingrese su correo">
                    @include('partials.message', ['input' => 'email'])
                    </div>
                
                    <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Recuperar Contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
