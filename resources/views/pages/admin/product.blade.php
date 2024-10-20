@extends('layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            @livewire('admin.product.index')
        @break

        @case(2)
            @livewire('admin.product.create')
        @break

        @case(3)
            @livewire('admin.product.edit',['product' => $product])
        @break
        
        @case(4)
            @livewire('admin.product.price',['product' => $product])
        @break
        @default
    @endswitch
@endsection
