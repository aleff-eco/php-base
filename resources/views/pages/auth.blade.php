@extends('layouts.authentication')
@section('content')
    @switch($section)
        @case(1)
            @livewire('auth.login')
        @break

        @case(2)
            @livewire('auth.dashboard')
        @break

        @case(3)
            @livewire('auth.forget-password')
        @break

        @case(4)
            @livewire('auth.forget-password-link',['token' => $token])
        @break
        
        @case(5)
            @livewire('auth.customer-registration')
        @break
        @default
    @endswitch
@endsection
