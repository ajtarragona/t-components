@props([
    'family' => 'bootstrap',
    'name' => ''
])
@if($family=="bootstrap")
    <i {{$attributes->merge(['class'=>'bi bi-'.$name])}}></i>
@endif