@props([
    'color'=>'primary',
    'icon'=>null,
    'size'=>'md',
    'type'=>'button',
    'pill'=>false,
])

<button type="{{$type}}" {{$attributes->merge(['class'=> 'btn btn-'.$color.' btn-'.$size.' ' .($pill?'rounded-pill':'') ])}}>
    @if($icon)
    <x-t-icon :name="$icon" class="me-1"/> 
    @endif
    {{$slot}}
</button>