@props([
    'placeholder'=>'',
    'name'=>null,
    'id'=>null,
    'value'=>null,
    'bubble'=>false,
    'placeholder'=>null,
    'readonly'=>false,
    'toolbar'=>'simple',
    'height'=>null,
])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!$id && $name) $id = $name;
@endphp
<div 
    x-data="tTextEditorComponent({
        bubble: {{ $bubble?'true':'false' }},
        value: @if($attributes->whereStartsWith('wire:model')->first()) @entangle($attributes->wire('model')) @else '{{ addslashes($value) }}' @endif ,
        placeholder: '{{ addslashes($placeholder) }}',
        readonly: {{ $readonly ? 'true':'false' }},
        toolbar: '{{ $toolbar }}',
    })"
    class=" {{$attributes["outer-class"]??''}}"
>
{{-- {{$placeholder}} --}}

    {{-- <div>
    <input id="{{$id}}" type="hidden" name="{{$name}}">
    <trix-editor input="{{$id}}" class="trix-content"></trix-editor>
    </div> --}}
    <div wire:ignore>
        <input  type="hidden" name="{{$name}}" x-ref="q-input" value="">

        <div class="q-wrapper" >
            <div x-ref="q-editor" id="{{$id}}" class="q-editor" style="{{$height?('height:'.$height):''}}">{!! $value !!}</div>
        </div>
    </div>

</div>
@include('t-components::components.'.config('t-components.theme').'.forms._input_error')