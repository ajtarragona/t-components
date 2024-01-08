@props([
    'color'=>'primary',
    'icon'=>null,
    'size'=>'md',
    'name'=>null,
    'id'=>null,
    'value'=>1,


])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!$id && $name) $id = $name;
@endphp

<span class="t-input">
    <input type="range" 
        class="form-range form-range-{{$color}} {{$attributes["class"]??''}}" 
        
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $attributes }}
    >
</span>
