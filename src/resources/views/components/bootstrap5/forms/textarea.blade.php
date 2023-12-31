@props([
    'icon'=>null,
    'size'=>'md',
    'color'=>'',
    'placeholder'=>'',
    'allowClear' => false,
    'hasValue' => false,
    // 'maxlength' => false,
    'charCounter'=>false
    
])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!($attributes["id"]??null) && ($attributes["name"]??null)) $attributes["id"] = $attributes["name"];
@endphp
<span 
    x-data="tTextComponent({
        allowClear: {{ $allowClear ? 'true':'false' }},
        icon: '{{ $icon }}',
        maxlength: {{ $maxlength??'false' }},
        charCounter: {{ $charCounter?'true':'false' }}
    })"
    class="t-input {{$attributes["outer-class"]??''}}"
    :class=" icon ? 'with-icon':''"
>
    

    <textarea 
       
        @input="refresh()"
        x-ref="input" 
        placeholder="{{$placeholder}}"  
        {{ $attributes->merge([
            'class' => 'form-control t-form-control '.((isset($attributes["name"]) && $errors->has($attributes["name"]) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':''). ' form-control-'.$size.' '. ($color?('bg-'.$color.' text-bg-'.$color):'')
        ]) }} 
    >{{ $slot }}</textarea>

    
    <i class="t-icon bi" :class="'bi-'+icon" x-show="icon"></i> 
    <small x-show="charCounter && inputLength" class="position-absolute end-0 bottom-0 m-1 badge text-bg-secondary fw-normal z-10 " x-text="inputLength"></small>
    <a type="button" x-show="allowClear && hasValue" @click.prevent.stop="clear" class="position-absolute end-0 top-0 p-2 text-reset z-10 " ><i class="bi bi-x"></i></a>


</span>
@include('t-components::components.'.config('t-components.theme').'.forms._input_error')