@extends('layouts.landing-page')

@section('title', 'Página no encontrada')

@section('content')
<div class="h-75vh flex items-center justify-center bg-gray-100">
    <div class="text-center">
        <h1 class="text-8xl font-semibold text-gray-700 mb-4">404</h1>
        <p class="text-xl text-gray-600 mb-10">Lo sentimos, la página que buscas no existe.</p>
        <a href="/"
            class="bg-[#F1861E] text-white px-12 py-2 mt-4 rounded-lg font-semibold inline-block  hover:scale-105 transform transition duration-300">
            Volver al inicio.
        </a>
    </div>
</div>
@endsection
