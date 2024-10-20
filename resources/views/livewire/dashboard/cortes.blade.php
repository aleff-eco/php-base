<div class="bg-white text-gray-900 dark:text-gray-200 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <div class="flex items-center space-x-2">
                <img src="https://via.placeholder.com/50x50" alt="Logo" class="h-12 w-12">
                <span class="text-xl font-bold tracking-wide text-red-600">Carnes Dbeef</span>
            </div>
            <!-- Links -->
            <ul class="hidden md:flex space-x-8 text-lg font-medium">
                <li><a href="#empresa" class="hover:text-red-600 transition-colors duration-300">Inicio</a></li>
                <li><a href="#trayectoria" class="hover:text-red-600 transition-colors duration-300">Nosotros</a></li>
                <li><a href="#productos" class="hover:text-red-600 transition-colors duration-300">Productos</a></li>
                <li><a href="#sucursales" class="hover:text-red-600 transition-colors duration-300">Sucursales</a></li>
                <li><a href="#contacto" class="hover:text-red-600 transition-colors duration-300">Contacto</a></li>
            </ul>
            <!-- Login/Signup -->
            <div class="flex space-x-4">
                <a href="/login" class="text-red-600 hover:text-white hover:bg-red-600 border border-red-600 px-3 py-2 rounded text-sm transition-colors duration-300">Iniciar Sesión</a>
                <a href="/register" class="bg-red-600 text-white hover:bg-red-700 px-3 py-2 rounded text-sm transition-colors duration-300">Crear una Cuenta</a>
            </div>
        </div>
    </nav>

    <!-- Sección de Productos -->
    <section id="productos" class="container mx-auto p-6 mt-10">
        <h2 class="text-3xl font-bold mb-8 text-red-600">Explora Nuestra Variedad de Productos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Tarjetas de productos -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="w-full h-40 bg-gray-100 dark:bg-gray-700 rounded-md mb-4 flex justify-center items-center">
                    <p class="text-gray-500 dark:text-gray-400">Imagen Producto 1 (150x150 px)</p>
                </div>
                <h3 class="text-2xl font-semibold mb-2 text-gray-800">Producto 1</h3>
                <p class="text-gray-700 dark:text-gray-300">Descripción general del producto 1.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="w-full h-40 bg-gray-100 dark:bg-gray-700 rounded-md mb-4 flex justify-center items-center">
                    <p class="text-gray-500 dark:text-gray-400">Imagen Producto 2 (150x150 px)</p>
                </div>
                <h3 class="text-2xl font-semibold mb-2 text-gray-800">Producto 2</h3>
                <p class="text-gray-700 dark:text-gray-300">Descripción general del producto 2.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                <div class="w-full h-40 bg-gray-100 dark:bg-gray-700 rounded-md mb-4 flex justify-center items-center">
                    <p class="text-gray-500 dark:text-gray-400">Imagen Producto 3 (150x150 px)</p>
                </div>
                <h3 class="text-2xl font-semibold mb-2 text-gray-800">Producto 3</h3>
                <p class="text-gray-700 dark:text-gray-300">Descripción general del producto 3.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contacto" class="bg-red-600 dark:bg-gray-800 text-white p-6 mt-12">
        <div class="container mx-auto text-center">
            <p class="text-lg font-semibold">© 2024 Carnes Dbeef. Todos los derechos reservados.</p>
            <p class="mt-2 text-gray-200">Calle Falsa 123, Ciudad, País | Teléfono: (123) 456-7890</p>
        </div>
    </footer>

</div>
