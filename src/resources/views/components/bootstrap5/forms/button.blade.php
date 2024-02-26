@props([
    'color'=>'primary',
    'icon'=>null,
    'iconPosition'=>'left',
    'size'=>'md',
    'type'=>'button',
    'pill'=>false,
    'ripple'=>false,
    'href'=>null
])

<{{$href?'a':'button'}} type="{{$href?'':$type}}" {!!$href?('href="'.$href.'"'):''!!} {{$attributes->merge(['class'=> 'btn btn-'.$color.' btn-'.$size.' ' .($pill?'rounded-pill':'').' '.($ripple?'ripple':'') ])}} 
    x-data="tButton({
        ripple: {{$ripple?'true':'false'}}
    })" x-ref="button"
    @click="createRipple(event)"

    >
    @if($iconPosition=="left" && $icon)
    <x-t-icon :name="$icon" class="me-1"/> 
    @endif
    {{$slot}}
    @if($iconPosition=="right" && $icon)
    <x-t-icon :name="$icon" class="ms-1"/> 
    @endif
</{{$href?'a':'button'}}>