@error('server')
    <section class="flex items-center bg-gray-50 font-poppins dark:bg-gray-800 ">
        <div class="justify-center flex-1 max-w-4xl px-4 py-4 mx-auto lg:py-10 ">
            <div x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-2"
                class="relative p-6 text-red-700 bg-red-100 border-b-2 border-red-500 dark:border-red-400 dark:bg-gray-800"
                role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="w-6 h-6 mr-4 text-red-500 dark:text-red-400 bi bi-check-circle-fill"></i>
                    </div>
                    <div>
                        <p class="mb-1 text-lg font-bold dark:text-gray-300">Error </p>
                        <p class="text-sm dark:text-gray-400">{{ $message }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@enderror
