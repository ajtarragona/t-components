@php
    $current=request()->url() == $item["url"]??null;
    $haschildren=$item["items"]??false;

@endphp

<li class="nav-item {{$haschildren?'dropdown':''}}">
    <a class="nav-link {{$haschildren?'dropdown-toggle':''}} {{  $current?'active':'' }}" 
        @if($item["url"]??null)
            href="{{$item["url"]}}"
        @else
            wire:ignore.self type="button" role="button" data-bs-toggle="dropdown" aria-expanded="false"
        @endif
    >

        @if($item["icon"]??null)<i class="bi {{$item["icon"]}} me-2"></i> @endif {!! $item["name"] ?? '' !!}
    </a>
    @if($item["items"]??null)
        <ul class="dropdown-menu" wire:ignore.self>
            
            @foreach($item["items"] as $subitem)
                @include('t-components::components.bootstrap5._nav-item',['item'=>$subitem])
            @endforeach
        </ul>
    @endif
</li>