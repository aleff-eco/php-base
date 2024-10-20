@extends('layouts.landing-page')
@section('content')
    @switch($section)
        @case(1)
            @livewire('dashboard.home')
        @break

        @case(2)
            @livewire('dashboard.informacion')
        @break

        @case(3)
            @livewire('public-product.index')
        @break

        @case(4)
            @livewire('dashboard.ver', ['id' => $id])
        @break

        @case(5)
            @livewire('dashboard.nosotros')
        @break

        @case(6)
            @livewire('dashboard.contactanos')
        @break
        @default

    @endswitch
@endsection
