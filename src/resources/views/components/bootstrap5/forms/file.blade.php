@props([
    'color'=>'',
    'icon'=>null,
    'size'=>'md',
    'name'=>null,
    'id'=>null,
    'value'=>1,
    'multiple'=>false,
    'allowes_types'=>null,
    'maxsize'=>null,


])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!$id && $name) $id = $name;
@endphp
{{-- 
<span class="t-input">

    <input class="form-control form-control-{{$size}} {{($color?('bg-'.$color.' text-bg-'.$color):'')}}" type="file" 
        id="{{ $id }}"
        name="{{ $name }}" 
        {{ $multiple?'multiple':''}}
        {{ $attributes }} 
    />



</span> --}}




<div :class="imageUrl && 'border-orange-500 dark:border-pink-500'"
     class="flex justify-center items-center border-2 border-gray-300 dark:border-dark-line border-dashed rounded-md h-48 overflow-y-hidden"
     x-data="tFile">

    <template x-if="!imageUrl">
        <div class="space-y-1 text-center px-6 pt-5 pb-6 w-full">
            <i class="bi bi-file-arrow-up"></i>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                <label
                    class="relative cursor-pointer bg-transparent rounded-md font-medium text-orange-500 dark:text-pink-500"
                    for="post_image">
                    <p class="text-gray-500 dark:text-white space-y-1">
                        <span class="text-orange-500 dark:text-pink-500">Upload a file</span> or drag and drop
                        <span class="block text-xs text-gray-500">PNG, JPG up to *MB</span>
                    </p>
                    {{--File input moved outside of template so to not be overwritten by the x-if --}}
                </label>
            </div>
        </div>
    </template>

    <template x-if="imageUrl">
        <div class="object-contain group relative">
            <div
                class="hidden group-hover:flex absolute justify-center items-center m-auto text-white tracking-wider uppercase bg-transparent h-full w-full hover:bg-black/75 hover:cursor-pointer"
                x-on:click="imageUrl = ''">
                Remove
            </div>
            <img :src="imageUrl" alt="" x-bind:class="{ 'hidden': !imageUrl }">
        </div>
    </template>

    <input class="sr-only" id="post_image" name="post_image" type="file" x-on:change="selectFile">
    <input value="{{ $post->post_image??'' }}" id="post_header_delete" name="post_header_delete" type="hidden"/>
</div>
