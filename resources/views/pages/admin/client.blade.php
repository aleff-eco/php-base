@extends('layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            @livewire('admin.client.index')
        @break

        @case(2)
            @livewire('admin.client.create',['user' => $user])
        @break

        @case(3)
            @livewire('admin.client.edit',['client' => $client])
        @break

        @default
    @endswitch
@endsection
