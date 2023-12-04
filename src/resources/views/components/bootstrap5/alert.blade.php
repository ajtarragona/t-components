
@props(['type' => 'info', 'close' => true])

<div {{ $attributes->merge(['class' => 'alert alert-'.$type .' '.(isTrue($close)?'alert-dismissible':'')]) }} 
    x-data="{ open: true }" 
    x-show="open" 
    x-transition.opacity>
       
       @if($title??null)
       <h5 class="alert-heading">{!!$title!!}</h5>

        @endif
        
        {!! $slot !!}
       

        @if(isTrue($close))
            {{-- <button type="button" class="btn-close" x-on:click="open=false;$event.target.remove" data-bs-dismiss="alert" aria-label="Close"></button> --}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        @endif
</div>