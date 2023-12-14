@props([
    'native'=>false,
    'value' => null,
        'icon'=>null,
        'placeholder'=>'',
    'dateFormat'=>'d/m/Y',
    'timeFormat'=>'H:i',
    'allowInput'=>false,
    'altInput'=>false,
    'minDate'=>false,
    'maxDate'=>false,
    'multiple'=>false,
    'allowClear'=>false,
    'nativeMobile'=>true,
    'enableTime'=>false,
    'enableDate'=>true,
    'range'=>false,
    'disabled'=>false,
    'color'=>null,
    
    
])

@php 

$json_value="''";
if($value){
    if(is_array($value)){
        $json_value=json_encode($value);
    }else{
        $json_value="'".$value."'";
    }
}



//si no pasan el ID y sí el name, el ID será igual al name
if(!($attributes["id"]??null) && ($attributes["name"]??null)) $attributes["id"] = $attributes["name"];

if(isset($attributes["id"])) $altInput="true"; //parche

@endphp

<span 
wire:key="{{ rand() }}"

 class="t-input flex-grow-1  {{$native?'':'flatpickr'}} {{$icon?'with-icon':''}} {{$attributes["outer-class"]??''}}"
    x-data="tDate({
        native: {{ $native ?'true':'false'}},
        allowClear: {{ $allowClear ? 'true':'false' }},
        value:  @if($attributes->whereStartsWith('wire:model')->first())  @entangle($attributes->wire('model'))  @else  {{ $json_value }} @endif 


    })"
>   

    <input placeholder="{{$placeholder}}" 
        {{ $attributes->except(['type'])->merge(['class' => 'form-control '.((isset($attributes["name"]) && $errors->has($attributes["name"]) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':'').' t-form-control '.($color?('bg-'.$color .' text-bg-'.$color):'')]) }} 
        
        
        {{-- :type="native?'date':'text'"  --}}

        type="{{$native?'date':'text'}}"
        x-ref="date-input"
        x-cloak
        {{$disabled?'disabled':''}}
        @if(isTrue($altInput))
            data-alt-input="true"
            data-date-format="Y-m-d" 
            data-alt-format="{{ (isTrue($enableDate)?$dateFormat:'') . (isTrue($enableDate)&&$enableDate?' ':'') . ($enableTime? $timeFormat :'')  }}" 
        @else
            data-alt-input="false"
            data-date-format="{{ (isTrue($enableDate)?$dateFormat:'') . (isTrue($enableDate)&&$enableDate?' ':'') . ($enableTime? $timeFormat :'')  }}" 
        @endif

        data-allow-input="{{$allowInput?'true':'false'}}" 
        
        data-default-date="{{ $json_value }}"
        data-disable-mobile="{{isTrue($nativeMobile)?'false':'true'}}"
        data-enable-time="{{$enableTime?'true':'false'}}"
        data-time_24hr="true"
        data-min-date="{{$minDate}}"
        data-max-date="{{$maxDate}}"
        data-no-calendar="{{isTrue($enableDate)?'false':'true'}}"
        
        @if($range) data-mode="range" @endif

        @if($multiple) data-mode="multiple" @endif


        />
    @if($icon)
        <i class="t-icon bi bi-{{$icon}}"></i> 
    @endif

    <a type="button" x-show="allowClear && hasValue" @click.prevent.stop="clear" class="position-absolute end-0 top-0 p-2 text-reset  z-10 " ><i class="bi bi-x"></i></a>


</span>
@include('t-components::components.'.config('t-components.theme').'.forms._input_error')