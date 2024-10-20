<nav class="bg-black p-2 relative z-50">
    <div class="container mx-auto flex justify-between items-center">
        <div id="menu" class="hidden md:flex md:flex-row md:space-x-6 w-full md:w-auto">
            <a href="/" id="inicio" class="nav-link text-white px-4 py-2 rounded-md text-base font-medium relative transition-transform duration-300 ease-in-out group">
                Inicio
                <span class="underline-indicator absolute bottom-0 left-0 w-full h-0.5 bg-[#F1861E]  scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 ease-in-out"></span>
            </a>
            <a href="/nosotros" id="nosotros" class="nav-link text-white px-4 py-2 rounded-md text-base font-medium relative transition-transform duration-300 ease-in-out group">
                Nosotros
                <span class="underline-indicator absolute bottom-0 left-0 w-full h-0.5 bg-[#F1861E]  scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 ease-in-out"></span>
            </a>
            <a href="/productos" id="productos" class="nav-link text-white px-4 py-2 rounded-md text-base font-medium relative transition-transform duration-300 ease-in-out group">
                Productos
                <span class="underline-indicator absolute bottom-0 left-0 w-full h-0.5 bg-[#F1861E]  scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 ease-in-out"></span>
            </a>
            <a href="/contactanos" id="contacto" class="nav-link text-white px-4 py-2 rounded-md text-base font-medium relative transition-transform duration-300 ease-in-out group">
                Contacto
                <span class="underline-indicator absolute bottom-0 left-0 w-full h-0.5 bg-[#F1861E]  scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 ease-in-out"></span>
            </a>
        </div>
        <div class="md:ml-auto">
            <a href="/">
                <img src="/storage/logos/logos-dbeefmax-04.png" alt="D Beefmax" class="h-16 w-auto">
            </a>
        </div>
        <div class="md:hidden">
            <button id="menu-button" class="text-white hover:bg-neutral-600 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-500">
                <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden text-white hover:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    <div id="mobile-menu" class="hidden fixed right-4 top-16 bg-neutral-700 text-white rounded-lg shadow-lg p-6 w-64 z-50 flex-col space-y-4 md:hidden">
        <a href="/" class="hover:bg-neutral-600 px-4 py-2 rounded-md text-base font-medium transition-transform duration-300 block">Inicio</a>
        <a href="/nosotros" class="hover:bg-neutral-600 px-4 py-2 rounded-md text-base font-medium transition-transform duration-300 block">Nosotros</a>
        <a href="/productos" class="hover:bg-neutral-600 px-4 py-2 rounded-md text-base font-medium transition-transform duration-300 block">Productos</a>
        <a href="/contactanos" class="hover:bg-neutral-600 px-4 py-2 rounded-md text-base font-medium transition-transform duration-300 block">Contacto</a>
    </div>
</nav>

<style>
    a:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease, font-size 0.3s ease;
    }

    .active .underline-indicator {
        transform: scaleX(1);
    }

    .active {
        font-size: 1.1rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const currentPath = window.location.pathname.replace(/\/$/, ''); // Remueve cualquier barra al final
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            const href = link.getAttribute('href').replace(/\/$/, ''); // Asegúrate de remover cualquier barra al final de las rutas
            if (href === currentPath) {
                link.classList.add('active'); // Agrega la clase 'active' si coinciden las rutas
            }
        });
    });

    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('overlay');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');

    menuButton.addEventListener('click', function () {
        // Mostrar el menú móvil y el overlay
        mobileMenu.classList.toggle('hidden');
        overlay.classList.toggle('hidden');

        // Alternar entre el ícono de hamburguesa y el de cerrar
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');

        // Deshabilitar el scroll cuando el menú está abierto
        if (!mobileMenu.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';  // Deshabilitar el scroll
        } else {
            document.body.style.overflow = '';  // Restaurar el scroll
        }
    });

    // Cerrar el menú si se hace clic fuera de la ventana (en el overlay)
    overlay.addEventListener('click', function () {
        mobileMenu.classList.add('hidden');
        overlay.classList.add('hidden');
        hamburgerIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        document.body.style.overflow = '';  // Restaurar el scroll
    });
</script>
