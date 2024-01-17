@props([
    'color'=>'primary',
    'icon'=>null,
    'iconPosition'=>'left',
    'size'=>'md',
    'type'=>'button',
    'pill'=>false,
])

<button type="{{$type}}" {{$attributes->merge(['class'=> 'btn btn-'.$color.' btn-'.$size.' ' .($pill?'rounded-pill':'') ])}}>
    @if($iconPosition=="left" && $icon)
    <x-t-icon :name="$icon" class="me-1"/> 
    @endif
    {{$slot}}
    @if($iconPosition=="right" && $icon)
    <x-t-icon :name="$icon" class="ms-1"/> 
    @endif
</button>