<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- VISTA CLIENT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baumans&display=swap');

        .font {
            font-family: "Baumans", system-ui;
            font-weight: 400;
            font-style: normal;
        }
    </style>
    {{-- test --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- produccion --}}
    {{-- @php
        $cwd = getcwd();
        $cssName = basename(glob($cwd . '/build/assets/*.css')[0], '.css');
        $jsName = basename(glob($cwd . '/build/assets/*.js')[0], '.js');
        $css = asset('build/assets/' . $cssName . '.css');
        $js = asset('build/assets/' . $jsName . '.js');
    @endphp
    <link rel="stylesheet" href="{{ $css }}" id="css">
    <script src="{{ $js }}" id="js"></script> --}}
    {{-- Agrega aquí tus estilos comunes --}}
    @livewireStyles
</head>

<body class="antialiased">

    {{-- @auth
        @include('partials.alerts')
        @include('partials.sidebar')
    @endauth --}}

    @yield('content')

    @livewireScripts


</body>

</html>
