@extends('layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            @livewire('user.index')
        @break

        @case(2)
            @livewire('user.create')
        @break

        @case(3)
            @livewire('user.show',['user' => $user])
        @break

        @case(4)
            @livewire('user.edit',['user' => $user])
        @break

        @default
    @endswitch
@endsection