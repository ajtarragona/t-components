@props([
    'icon'=>null,
    'size'=>'md',
    'color'=>'',
    'placeholder'=>'',
    'allowClear' => false,
    'hasValue' => false,
    'type' => 'text',
    'allowInput' => true,
    // 'maxlength' => false,
    
])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!($attributes["id"]??null) && ($attributes["name"]??null)) $attributes["id"] = $attributes["name"];
@endphp

<span 
    x-data="tTextComponent({
        allowClear: {{ $allowClear ? 'true':'false' }},
        allowInput: {{ isTrue($allowInput) ? 'true':'false' }},
        icon: '{{ $icon }}',
        maxlength: '{{ $maxlength??'false' }}'
    })"
    class="t-input {{$attributes["outer-class"]??''}}" 
    :class=" icon ? 'with-icon':''"
    >

    <input 
       
    
        @input="checkValue()"
        @if(!isTrue($allowInput)) @keypress.prevent.stop="true" @endif
        type="{{$type}}" 
        placeholder="{{$placeholder}}" 
        x-ref="input" 
        
        {{ $attributes->except(['type','size'])->merge([
            'class' => 'form-control t-form-control '.((isset($attributes["name"]) && $errors->has($attributes["name"]) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':''). ' form-control-'.$size .' '. ($color?('bg-'.$color.' text-bg-'.$color):'')
        ]) }} 
        
    >

    <i class="t-icon bi" :class="'bi-'+icon" x-show="icon"></i> 
    
    <a type="button"  x-cloak x-show="allowClear && hasValue" @click.prevent.stop="clear" class="position-absolute end-0 top-0 p-2 text-reset  z-10  align-self-end {{$type=="number"?'me-4':''}}" ><i class="bi bi-x"></i></a>

    
</span>
@include('t-components::components.'.config('t-components.theme').'.forms._input_error')