<div>
    <div class="container px-4 mx-auto"></div>
    <div class="grid w-full gap-4 mb-6 md:grid-cols-4">
        <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>ID:</strong> {{ $user->id }}
        </p>

        <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>Nombre:</strong>
            {{ $user->person->names . ' ' . $user->person->surnames }}
        </p>

        <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>Correo:</strong> {{ $user->email }}
        </p>

    </div>
    <div class="grid w-full gap-4 md:grid-cols-2">

        <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>Rol:</strong> {{ $user->role->name }}
        </p>


        {{-- @if ($user->role->id == 2)
            <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>Punto de Venta:</strong>
                <span>{{ $user->userSalesPoint->salesPoint->name }}</span>
            </p>
        @endif --}}
        <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>Status:</strong> <span
                class="px-2 rounded-md py-1 text-gray-700 {{ $user->status_id == 1 ? 'bg-green-200' : 'bg-red-200' }}">{{ $user->status->name }}</span>
        </p>

        <p class="block mb-2 text-sm font-medium dark:text-gray-400"><strong>Fecha de Registro:</strong>
            {{ $user->created_at->format('d/m/Y H:i:s') }}
        </p>
    </div>

    <div class="mt-7">
        <div class="flex justify-start space-x-2">
            <a href="{{ route('users.edit', $user->id) }}"
                class="inline-block px-4 py-2 text-xs font-medium leading-tight text-white rounded shadow-md bg-amber-500 hover:bg-amber-600">Editar</a>
            <a href="{{ route('users.index') }}"
                class="inline-block px-4 py-2 text-xs font-medium leading-tight text-white bg-red-500 rounded shadow-md hover:bg-red-600">Regresar</a>
        </div>
    </div>
</div>