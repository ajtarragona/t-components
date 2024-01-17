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
])

@php
    if(!$id) $id=str_slug($name)."_".$value;
@endphp

<div x-data=""
    x-modelable="checked"
class="form-check form-check-{{$color}} {{($switch?'form-switch':'')}} {{($inline?'form-check-inline':'')}} {{($reverse?'form-check-reverse':'')}} "  >
    <input class="form-check-input" x-ref="input" type="radio"  {{$checked?'checked':''}}   {{$switch?'role="switch"':''}} value="{{$value}}" {{$disabled?'disabled':''}} id="{{$id}}" name="{{ $name }}">
    @if($slot || $icon)
        <label class="form-check-label" for="{{$id}}">
            @if($icon)
            <x-t-icon :name="$icon" class="me-1"/> 
            
            @endif
            {{$slot}}
        </label>
    @endif
  </div>