@extends('layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            {{-- @livewire('admin.school.index') --}}
        @break

        @case(2)
            {{-- @livewire('admin.inventory.create',['product' => $product]) --}}
        @break

        @case(3)
            @livewire('admin.inventory.edit',['product' => $inventory])
        @break

        @default
    @endswitch
@endsection
