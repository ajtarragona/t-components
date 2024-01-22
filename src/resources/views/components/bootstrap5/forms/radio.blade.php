@props([
    'color'=>'primary',
    'icon'=>null,
    'size'=>'md',
    'switch'=>false,
    'inline'=>false,
    'id'=>null,
    'name'=>null,
    'disabled'=>false,
    'value'=>1,
    'reverse'=>false,
    'checked'=>false,   
    'size'=>'md',   
    'outerClass'=>false,   

])

@php
    if(!$id) $id=str_slug($name)."_".$value;
@endphp

<div 
    x-data="{
        checked: {{ isTrue($checked)?'true':'false' }},
    }"
    x-modelable="checked"
    {{ $attributes->whereStartsWith('x-') }}
    
    class="form-check  form-check-{{$size}} form-check-{{$color}} {{($switch?'form-switch':'')}} {{($inline?'form-check-inline':'')}} {{($reverse?'form-check-reverse':'')}} {{$outerClass}}"  >
    <input class="form-check-input" x-ref="input" type="radio"  x-model="checked" {{$checked?'checked':''}}   {{$switch?'role="switch"':''}} value="{{$value}}" {{$disabled?'disabled':''}} id="{{$id}}" name="{{ $name }}">
    @if($slot || $icon)
        <label class="form-check-label" for="{{$id}}">
            @if($icon)
            <x-t-icon :name="$icon" class="me-1"/> 
            
            @endif
            {{$slot}}
        </label>
    @endif
  </div>