@props([
    'label'=>false,
    'labelPlacement'=>'top',
    'for'=>false,
    'boxed'=>false,
    'floating'=>false,
    'icon'=>null,
    'labelAlign'=>'left',
    'labelWidth'=>null,
    'formText'=>null,
    'color'=>null,
    'required'=>false,
])

<div  
    x-data="{
        focused:false, 
        required:{{$required?'true':'false'}},
        floating:{{$floating?'true':'false'}},
    }"
    x-init=""
    :class="{'focused':focused,'required':required}"
    {{ $attributes->merge(['class' => 't-form-group ' . ($floating?' floating ':''). ($boxed?'boxed '.($color?'boxed-'.$color:''):($color?'text-'.$color:'')). ' label-'. $labelPlacement ]) }}>
    
    
    @if($label || $icon) 
        <label for="{{$for}}" class="form-label text-{{$labelAlign}} w-{{$labelWidth}} " style="{{$labelWidth?('width:'.($labelWidth=="fit-content"?'':$labelWidth)):''}}">
            @if($icon)
                <i class="t-icon bi bi-{{$icon}}"></i>  
            @endif
            @if($label)
                {{$label}}
            @endif
        </label> 
    @endif

    <div class="t-input-container d-flex flex-column flex-grow-1">
        {{$slot}}

        @if($formText)
        <div class="form-text "><small>{!! $formText !!}</small></div>
        @endif  

    </div>
</div>