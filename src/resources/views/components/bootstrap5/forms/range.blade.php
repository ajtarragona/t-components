@props([
    'color'=>'primary',
    'icon'=>null,
    'size'=>'md',
    'name'=>null,
    'value'=>1,


])

<span class="t-input">
    <input type="range" 
        class="form-range form-range-{{$color}} {{$attributes["class"]??''}}" 

        name="{{ $name }}"
        {{ $attributes }}
    >
</span>
