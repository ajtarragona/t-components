@props([
    'color'=>'',
    'icon'=>null,
    'size'=>'md',
    'name'=>null,
    'id'=>null,
    'multiple'=>false,
    'allowedTypes'=>'',
    'maxsize'=>null,
    'required'=>false,
    'placement'=>'left',
    'containerClass' =>'',
    'class' =>'',
    'readonly'=>false,
    'label' =>'',
    'formText' =>'',
    'signed' =>false,
    'autoUpload' =>false,
    'files'=>null
])

@php
    //si no pasan el ID y sí el name, el ID será igual al name
    if(!$id && $name) $id = $name;
    if(!$name) $name=uniqid('field_');

    $errorname=$name;
    if($errorname){
        $errorname=str_replace(["[","]"],[".",""],$errorname);
    }

    $input_name=$name;
    if($multiple && ! ends_with($name, "[]")) $input_name.="[]";



@endphp


{{-- @dump($name) --}}


<div class=" t-input-file " :class="container_class" x-data='tFile({
    placement: "{{$placement}}",
    required:  {{$required?'true':'false'}},
    multiple: {{$multiple?'true':'false'}},
    signed: {{$signed?'true':'false'}},
    maxsize: {{$maxsize?"'$maxsize'":'null'}},
    label:  "{{$label}}",
    form_text:  "{{$formText}}",
    container_class :  "{{$containerClass}}",
    allowed_types :  "{{$allowedTypes}}",
    class :  "{{$class}}",
    auto_upload :  {{$autoUpload?'true':'false'}},
    files : @json($files??[])

})'>
    
    <div class=""  id="file_container_{{str_slug($name)}}" >

        <div class="d-block d-md-flex ">
            <div class="col-file-input dropend" :class="colInputClass()">
                <label for="file_{{str_slug($name)}}" class="file-btn mb-2" >
                    
                    <template x-if="!hasFiles()" x-cloak >
                        <i class="bi bi-plus" title="Afegir arxiu" ></i>
                    </template>

                    <template x-if="hasFiles()" x-cloak >
                        <div class="d-flex flex-column align-items-center justify-content-around">
                            <i class="bi bi-x" @click.prevent.stop="clear()" title="Esborrar" ></i>
                            
                            <i class="bi bi-plus" x-show="multiple" title="Afegir arxiu"></i>
                            <i class="bi bi-list-task" x-show="multiple" @click.prevent.stop="showFiles()"  data-bs-toggle="modal" data-bs-target="#file_detail_{{str_slug($name??'')}}" title="Veure arxius"></i>
                        </div>
                    </template>
                    <span class="badge bg-primary rounded-pill " x-show="multiple && hasFiles()" x-cloak x-text="hasFiles()?files.length:0"></span>
                </label>
                
                <div class="opacity-50 text-center placeholders" x-show="!hasFiles()" x-cloak>
                    <span class="placeholder placeholder-sm col-12"></span>
                    <span class="placeholder placeholder-xs col-5"></span>
                    
                </div>
                <div class="text-truncate text-center selected-files" x-show="hasFiles()" x-cloak>
                    <small x-html="selectedFilesLabel()">
                    </small>
                </div>

                
                <input class="form-control" x-ref="input" hidden type="file" x-on:change="files = Object.values($event.target.files)"   id="file_{{str_slug($name)}}" name="{{$input_name}}" :multiple ="multiple">
            </div>

            <div class="col-file-detail pt-4 pt-md-0 " :class="colDetailClass()">

                <label for="file_{{str_slug($name)}}" class="form-label" x-show="label" x-cloak>
                    <span x-html="label"></span> <small class="text-gray-500" >(<span x-text="requiredLabel()"></span>)</small>
                </label>

                    <div class="form-text" x-show="form_text" x-text="form_text" x-cloak></div>

                    <div class="d-block d-lg-flex text-gray-500 mt-2 ">
                        <div class=" border-bottom border-bottom-lg-0 border-end-0 border-end-lg pe-0 pe-lg-3">
                            <div class="">
                                <h5 class="text-gray-600 fs-6">{{ __('Característiques') }}</h5>
                                <small>
                                    <ul class="list-unstyled">
                                        <li class="text-truncate">
                                            <i :class="{'bi bi-check-circle-fill':required,'bi bi-check-circle':!required}"></i>
                                            <span x-text="requiredLabel()"></span>
                                        </li>
                                        <li class="text-truncate">
                                            <i :class="{'bi bi-files':multiple,'bi bi-1-square':!multiple}"></i>
                                            <span x-text="multipleLabel()"></span>
                                        </li>
                                        <li class="text-truncate">
                                            <i :class="{'bi bi-patch-check-fill':signed,'bi bi-patch-check':!signed}"></i>
                                            <span x-text="signedLabel()"></span>
                                        </li>
                                        <li class="text-truncate">
                                            <i :class="{'bi bi-aspect-ratio-fill':maxsize,'bi bi-aspect-ratio':!maxsize}"></i>
                                            <span x-text="maxsizeLabel()"></span>
                                        </li>
                                    </ul>
                                </small>
                            </div>

                        </div>
                        <div class=" ps-0 ps-lg-3 pt-3 pt-lg-0">
                            <div class="">
                                <h5 class="text-gray-600 fs-6">{{ __('Tipus admesos') }}</h5>
                                <small>
                                <ul class="list-inline">
                                    <template x-if="allowedAll()">
                                        <li class="list-inline-item"><x-t-icon name="files"/> <span x-text="strings.all_allowed"></span></li>

                                    </template>
                                    <template x-if="!allowedAll()">
                                        <span>
                                            {{-- <span x-text="allowedOther()"></span> --}}
                                            <template x-for="tipo in getAllowedTypes()" >
                                                <template x-if="strings.types[tipo]??null">
                                                    <li class="list-inline-item" ><i class="bi" :class="type_icons[tipo]"></i> <span x-text="strings.types[tipo]??''"></span></li>
                                                </template>
                                            </template>
                                            <template x-if="allowedOther()">
                                                <li class="list-inline-item"  x-cloak>
                                                    <i class="bi bi-files"></i> <span x-text="strings.types.other"></span>: 
                                                    <span x-text="allowedOther().join(', ')"></span>
                                                </li>
                                            </template>
                                        </span>
                                    </template>

                                </ul>
                                </small>
                            </div>
                        </div>
                    </div>

                {{-- @if ($form->file($name))
                    @include('forms.common._file_detail',['file'=>$form->file($name)])
                @endif --}}
                
            </div>
        </div>
    </div>

    @include('t-components::components.'.config('t-components.theme').'.forms._file_detail')
    
    
</div>
@include('t-components::components.'.config('t-components.theme').'.forms._input_error')