@extends('layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            @livewire('admin.subcategory.index', ['categoryId' => $categoryId])
        @break

        @case(2)
            @livewire('admin.subcategory.create', ['categoryId' => $categoryId])
        @break

        @case(3)
            @livewire('admin.subcategory.edit', ['categoryId' => $categoryId, 'subcategoryId' => $subcategoryId])
        @break

        @case(4)
            @livewire('admin.subcategory.delete', ['id' => $subcategory->id])
        @break

        @default
    @endswitch
@endsection
