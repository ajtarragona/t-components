@props([
    'color'=>'primary',
    'icon'=>null,
    'size'=>'md',
    'switch'=>false,
    'inline'=>false,
    'id'=>null,
    'name'=>null,
    'disabled'=>false,
    'indeterminate'=>false,
    'value'=>1,
    'reverse'=>false,
    'checked'=>false,   
])

@php
    if(!$id) $id=str_slug($name)."_".$value;
@endphp

<div 
x-data="{
    indeterminate: {{isTrue($indeterminate)?'true':'false'}},
    checked: {{ isTrue($checked)?'true':'false' }},
}"

x-modelable="checked" 
{{ $attributes->whereStartsWith('x-') }}

x-init="$refs['input'].indeterminate=indeterminate"

class="form-check form-check-{{$color}} {{($switch?'form-switch':'')}} {{($inline?'form-check-inline':'')}} {{($reverse?'form-check-reverse':'')}} "  >

    
    <input class="form-check-input" x-ref="input" type="checkbox" x-model="checked"  {{$switch?'role="switch"':''}} value="{{$value}}" {{$disabled?'disabled':''}} id="{{$id}}" name="{{ $name }}">
    @if($slot || $icon)
        <label class="form-check-label" for="{{$id}}">
            @if($icon)
            <x-t-icon :name="$icon" class="me-1"/> 
            @endif
            {{$slot}}
        </label>
    @endif
  </div>