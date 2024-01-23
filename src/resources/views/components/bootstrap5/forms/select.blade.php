@props([
    'data' => [],
    'placeholder' => 'Select an option',
    'limit' => 20,
    'color' => 'default',
    'class' => '',
    'outerClass' => '',
    'menuClass' => '',
    'label' => '',
    'icon' => null,
    'size' => 'md',
    'name' => '',
    'id' => '',
    'searchPlaceholder' => 'Type to search...',
    'emptyOptionsMessage' => 'No results.',
    'allowClear' => false,
    'selectedLabelLimit' => false,
    'selectedLabelLimitText' => 'and :num more...',
    'search' => false,
    'inlineSearch' => false,
    'selected' => '',
    'width' => false,
    'height' => false,
    'selectedLabelPrefix' => null,
    'selectedLabelSufix' => null,
    'selectedLabelGlue' => null,
    'native' => false,
    'dataSrc'=>null,
    'dataSrcMethod'=>null,
    'prefetch'=>false,
    'termName'=>false,
    'limitName'=>null,
    'grouped'=>false,
    'lazyLoad' => false,
    'overflow' => false,
    'overlay' => false,
    'overlayColor' => false,
   
])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!$id && $name) $id = $name;
@endphp
 @if(!$native)
    
    <div class="flex-grow-1 t-select {{$attributes["outer-class"]??''}} {{ $overlayColor?('overlay-'.$overlayColor) : '' }}" :class="{'overlay':overlay, 'opened':open,'with-search':search}"
        x-modelable="selected"
        {{ $attributes->whereStartsWith('x-') }}

        x-data="tSelectComponent({
            selected: @if($attributes->whereStartsWith('wire:model')->first()) @entangle($attributes->wire('model')) @else {{ $selected ? (is_array($selected)?json_encode($selected):$selected) :'null' }} @endif,
            data: {{ json_encode($data) }},
            color: '{{ $color }}',
            class: '{{ $class }}',
            size: '{{ $size }}',
            outerClass: '{{ $outerClass }}',
            label: '{{ addslashes($label) }}',
            icon: '{{ $icon }}',
            name: '{{ $name }}',
            id: '{{ $id }}',
            searchPlaceholder: '{{ addslashes($searchPlaceholder) }}',
            emptyOptionsMessage: '{{ addslashes($emptyOptionsMessage) }}',
            placeholder: '{{ addslashes($placeholder) }}',
            multiple: {{ isset($attributes['multiple']) ? 'true':'false' }},
            disabled: {{ isset($attributes['disabled']) ? 'true':'false' }},
            readonly: {{ isset($attributes['readonly']) ? 'true':'false' }},
            limit: {{ (!$limit || isFalse($limit)) ? 'false':  $limit }},
            allowClear: {{ $allowClear ? 'true':'false' }},
            grouped: {{ $grouped ? 'true':'false' }},
            selectedLabelLimit: {{ $selectedLabelLimit ? $selectedLabelLimit:'false' }},
            selectedLabelLimitText: '{{ addslashes($selectedLabelLimitText) }}',
            search: {{ $search ? 'true':'false' }},
            inlineSearch: {{ $inlineSearch ? 'true':'false' }},
            width: {{ $width ? '\''.$width.'\'' :'false' }},
            selectedLabelPrefix: {{ !is_null($selectedLabelPrefix)? '\''.addslashes($selectedLabelPrefix).'\'' :'null' }},
            selectedLabelSufix: {{ !is_null($selectedLabelSufix)? '\''.addslashes($selectedLabelSufix).'\'' :'null' }},
            selectedLabelGlue: {{ !is_null($selectedLabelGlue)? '\''.addslashes($selectedLabelGlue).'\'' :'null' }},
            dataSrc:   {{ $dataSrc ? '\''.$dataSrc.'\'' :'null' }},
            dataSrcMethod:   {{ $dataSrcMethod ? '\''.$dataSrcMethod.'\'' :'null' }},
            prefetch:    {{ isTrue($prefetch) ? 'true':'false' }},
            termName:   {{ $termName ? '\''.$termName.'\'' :'null' }},
            limitName:   {{ $limitName ? '\''.$limitName.'\'' :'null' }},
            lazyLoad : {{ $lazyLoad ? 'true':'false' }},
            overlay : {{ $overlay ? 'true':'false' }},
            height:{{ $height ? '\''.$height.'\'' :'false' }},

        })"
        
    
        
    

        
    >
        {{-- <span x-text="open"></span> --}}

        <span class="dropdown {{$width=='fit-content'?'d-inline-block':'d-block'}}" 
            :class="outerClass + (!width?' d-block': '')" 
            :style="(width && width!='fit-content')? ('width:'+width): '' "
            @click.away="closeSelect()" 
            @keydown.escape="closeSelect()"
            @keydown.tab="closeSelect()"
        

        >
            @if($search && $inlineSearch)
                <input class="form-control"
                    placeholder="{{$searchPlaceholder}}" 
                    x-model.debounce="term" 
                    x-ref="inlineSearchInput"
                    @keydown.enter.prevent.stop="selectCurrentOption()"
                    @keyup.down.prevent="increaseIndex()"
                    @keyup.up.prevent="decreaseIndex()"
                />
            @endif
        
            <button 
                
                type="button"
                class="btn dropdown-toggle t-select-dropdown d-flex align-items-center justify-content-start {{((isset($attributes["name"]) && $errors->has($attributes["name"]) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':'')}}"
                data-bs-toggle="dropdown"
                data-bs-auto-close="false"
                :class="btnClasses()"
                :id="id"
                :style="(width && width!='fit-content')?('width:'+width) :'' "
                x-ref="dropdown-btn"
                @if($overflow)
                    {{-- data-bs-boundary="viewport" --}}
                    data-bs-config='{"popperConfig":{"strategy":"fixed"}}'
                @endif
                {{-- @click="toggleSelect()" --}}
                
                @keyup.enter.prevent="selectCurrentOption()"
                @keyup.down.prevent="increaseIndex()"
                @keyup.up.prevent="decreaseIndex()"
            >
                <div class="text-truncate flex-grow-1 text-start">
                    
                    <i class="bi me-2 " :class="'bi-'+icon+' '+(selected?'':'opacity-50') " x-show="icon"></i> 
        
                    <span x-html="renderSelected()" :class="{'opacity-50':!hasSelected()}" ></span>
                    
                </div>
                <span :class="{'opacity-0 pe-none':!(allowClear && hasSelected()), 'ms-auto': width!='fit-content', 'ms-2': width=='fit-content'}" :visibility="{'hidden':!(allowClear && hasSelected())}"  @click.prevent.stop="clearSelected" class="text-reset  z-10  align-self-end" ><i class="bi bi-x"></i></span>
            
            </button>
            


            <ul 
                class="dropdown-menu  {{$menuClass??''}}"
                :class="{'show':open}"
                {{-- x-show="open" --}}
                x-cloak
                x-ref="dropdown"
                x-trap.noreturn="search && open "
                
            >
                <div class="inner">

                    <div class="px-2 pb-2 pt-2 pt-sm-0" x-show="search">
                        <x-t-text 
                            icon="search" 
                            placeholder="{{$searchPlaceholder}}" 
                            x-model.debounce="term" 
                            allowClear 
                            x-ref="searchInput"
                            @keydown.enter.prevent.stop="selectCurrentOption()"
                            @keyup.down.prevent="increaseIndex()"
                            @keyup.up.prevent="decreaseIndex()"
                        />
                    </div>

               

                    <div  class="relative overflow-y-auto options-container"  :style="(height ? 'max-height:'+height : '') " >
                        
                        
                        <div x-cloak x-show="!isLoading && Object.values(options).length === 0" class="opacity-75 small px-3 py-2" x-text="emptyOptionsMessage">Gragr</div>

                        @if($grouped)
                            
                            <template x-for="(group_name,gr_index) in Object.values(groups)" :key="gr_index">
                                <span x-show="getGroupOptions(group_name).length>0" class="group-container" >
                                    <li x-show="gr_index>0"><hr class="dropdown-divider"></li>

                                    <li class="group-header"><h6 class="dropdown-header" x-html="group_name"></h6></li>
                                        
                                    <template x-for="(option, index) in getGroupOptions(group_name)" :key="index" >
                                        <span class="group-item" x-data="{ index: optionsIndex }" x-init="optionsIndex++">
                                            {{-- <span x-text="index"></span> --}}
                                            @include("t-components::components.".config('t-components.theme').".forms._select_option")
                                        </span>
                                    </template>
                                </span> 
                            </template>

                        @else
                            <template x-for="(option, index) in Object.values(options)" :key="index" >
                            @include("t-components::components.".config('t-components.theme').".forms._select_option")
                            </template>
                        @endif

                        {{-- <div  class="p-2 opacity-50 mt-2" x-show="lazyLoad && !allLoaded"><small>Loading More ...</small></div> --}}
                        <div x-intersect.margin.100px="await loadMore()"  class="relative opacity-75 small p-3" x-show="isLoading || (lazyLoad && !allLoaded)" >
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                <span class="visually-hidden" x-text="loadingMessage"></span>
                            </div>
                            <span x-text="loadingMessage"></span>
                        </div>

                    </div>
                </div>
            </ul>
            {{-- <span x-text="JSON.stringify(data)" x-show="dataSrc"></span> --}}
            <select :multiple="multiple" :name="name" :disabled="disabled" :readonly="readonly" hidden class="form-select"  x-ref="selectInput">
                {{-- @if($grouped)
                    <template x-for="(group_name,gr_index) in Object.values(groups)" :key="gr_index">
                        <optgroup :label="group_name" x-show="getGroupOptions(group_name).length>0">
                            <template x-for="(option, index) in getGroupOptions(group_name)" :key="index" >
                                <option :value="option.key" x-text="option.value" :selected="isSelected(option.key)"></option>
                                </span>
                            </template>
                        </optgroup> 
                    </template>
                @else --}}
                <template x-for="(option,key) in Object.values(data)" >
                    <option :value="option.key" x-text="option.value" :selected="isSelected(option.key)"></option>
                </template>
                {{-- @endif --}}

            </select>
        </span>
    </div>
@else
    <select id="{{$id}}" name="{{$name}}" {{ isset($attributes['multiple'])?'multiple':''}} class="form-select {{$class}}">
        @foreach($data as $key=>$value)
            <option value="{{$key}}" {{$selected==$key?'selected':''}}>{{$value}}</option>
        @endforeach
    </select>
@endif
@include('t-components::components.'.config('t-components.theme').'.forms._input_error')