<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Meta descripción -->
    <meta name="description" content="Carne con garantía de alta calidad en Chiapas, 100% fresca. Con entrega directamente a tu domicilio. ¡Visítanos ahora!">

    <!-- Palabras clave -->
    <meta name="keywords" content="carnes tuxla gutierrez, Tuxla Gutierrez, Chiapas, D Beef Max, D Beef, tienda de carnes, carne fresca, cortes de carne, carne de res, carne, carne premium, carnicería, carne a domicilio, calidad, carne orgánica, garantía, carnicería">

    <!-- Meta de autor -->
    <meta name="author" content="D Beef MAX">

    <!-- Meta social (Open Graph para Facebook y Twitter Cards) -->
    <meta property="og:title" content="Tienda de Carnes - D Beef Max Tuxtla Gutierez">
    <meta property="og:description" content="Carne 100% orgánica. Cortes de alta calidad, compra con nosotros, con entregas en todo Tuxtla Gutierrez.">
    <meta property="og:image" content="/storage/public-content/NOSOTROS-IMAGEN-01.png">
    <meta property="og:url" content="https://dbeefmaxboutique.com/">
    <meta property="og:type" content="website">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tienda de Carnes - D Beef Max Tuxtla Gutierez">
    <meta name="twitter:description" content="Carne 100% orgánica. Cortes de alta calidad, compra con nosotros, con entregas en todo Tuxtla Gutierrez.">
    <meta name="twitter:image" content="/storage/public-content/NOSOTROS-IMAGEN-01.png">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">    

    {{-- test --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<body class="antialiased bg-gray-100">
    <main class="flex-grow">
        @include('partials.navbar')
        @yield('content')
        @include('partials.footer')
        {{-- @include('partials.contactBotton') --}}
    </main>
    @livewireScripts

    <script>
        const chatButton = document.getElementById('chat-button');
        const contactButtons = document.getElementById('contact-buttons');
        const buttons = contactButtons.querySelectorAll('a');
        const chatText = document.getElementById('chat-text');
        let isVisible = false;

        function showButtons() {
            buttons.forEach((button, index) => {
                setTimeout(() => {
                    button.classList.remove('opacity-0', 'translate-y-4');
                    button.classList.add('opacity-100', 'translate-y-0');
                }, (buttons.length - index - 1) * 100);
            });
        }

        function hideButtons() {
            buttons.forEach((button, index) => {
                setTimeout(() => {
                    button.classList.remove('opacity-100', 'translate-y-0');
                    button.classList.add('opacity-0', 'translate-y-4');
                }, index * 100);
            });
        }
        chatButton.addEventListener('click', function(e) {
            e.preventDefault();
            isVisible = !isVisible;
            if (isVisible) {
                contactButtons.classList.remove('hidden');
                showButtons();
                chatText.classList.add('hidden');
            } else {
                hideButtons();
                setTimeout(() => {
                    contactButtons.classList.add('hidden');
                }, buttons.length * 100);
                chatText.classList.remove('hidden');
            }
        });
    </script>
</body>

</html>