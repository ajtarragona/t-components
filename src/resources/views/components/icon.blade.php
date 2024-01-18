@props([
    'family' => 'bootstrap',
    'name' => ''
])
@if($family=="bootstrap")
    <i {{$attributes->merge(['class'=>'icon bi bi-'.$name])}}></i>
@endif