@extends('layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            @livewire('admin.category.index')
        @break

        @case(2)
            @livewire('admin.category.create')
        @break

        @case(3)
            @livewire('admin.category.edit', ['id' => $category->id])
        @break

        @case(4)
            @livewire('admin.category.subcategory.index',  ['id' => $category->id])
        @break

        @case(5)
        @livewire('admin.category.category.delete',  ['id' => $category->id])
        @break

        @default
    @endswitch
@endsection
