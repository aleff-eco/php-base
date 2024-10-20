@extends(auth()->user()->role_id == 2 ? 'layouts.client-layout' : 'layouts.admin')
@section('content')
    @switch($section)
        @case(1)
            @livewire('client.setting')
        @break

        @default
    @endswitch
@endsection