
@props([
    'type' => 'collapse', 
    'items' => [],
    'vertical'=>false,
])

<nav class="navbar">

    <ul {{ $attributes->merge(['class' => ' navbar-nav me-auto mb-2 mb-lg-0 ']) }}  >
        {{-- HOLA --}}
        @foreach($items as $item)
            @include('t-components::components.bootstrap5._nav-item')
        @endforeach

    </ul>
</nav>