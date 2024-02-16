

@props([
    'value' => null,
    'multiple'=>false,
    'allowClear'=>false,
    'icon'=>null,
    'color'=>'default',
    'disabled'=>false,
    'height'=>'200px',
    'width' => false,
    'class'=>null,
    'outerClass'=>null,
    'menuClass'=>null,
    'name'=>null,
    'id'=>null,
    'size' => 'md',
    'placeholder' => 'Select an icon',
    'search' => false,
    'grid'=>false,
    'overflow' => false
    
])
@php
//si no pasan el ID y sí el name, el ID será igual al name
if(!$id && $name) $id = $name;


$errorname=$name;

if($errorname){
    // dump($errorname);
    $errorname=str_replace(["[","]"],[".",""],$errorname);
    // dump($errorname);
}
@endphp
<span 
 class="t-select t-icon-picker flex-grow-1 {{$attributes["outer-class"]??''}}" :class="{'opened':open,'with-search':search}"
    x-modelable="value"
    
    {{ $attributes->whereStartsWith('x-') }}

    x-data="tIconPicker({
        color: '{{ $color }}',
        class: '{{ $class }}',
        size: '{{ $size }}',
        outerClass: '{{ $outerClass }}',
        icon: '{{ $icon }}',
        name: '{{ $name }}',
        id: '{{ $id }}',
        grid: {{ $grid ? '\''.$grid.'\'' :'false' }},
        allowClear: {{ $allowClear ? 'true':'false' }},
        placeholder: '{{ addslashes($placeholder) }}',
        width: {{ $width ? '\''.$width.'\'' :'false' }},
        search: {{ $search ? 'true':'false' }},
        height:{{ $height ? '\''.$height.'\'' :'false' }},
        value:  @if($attributes->whereStartsWith('wire:model')->first())  @entangle($attributes->wire('model'))  @else  {{ $value?('\''.$value.'\'') : 'null' }} @endif 
    })"

  
>   
    <span class="dropdown {{$width=='fit-content'?'d-inline-block':'d-block'}}" 
        :class="outerClass + (!width?' d-block': '')" 
        :style="(width && width!='fit-content')? ('width:'+width): '' "
        @click.away="closeDropdown()" 
        @keydown.escape="closeDropdown()"
     >

        <button 
                
            type="button"
            class="btn dropdown-toggle t-select-dropdown d-flex align-items-center justify-content-start {{(($errorname && $errors->has($errorname) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':'')}}"
            data-bs-toggle="dropdown"
            data-bs-auto-close="true"
            @if($overflow)
                {{-- data-bs-boundary="viewport" --}}
                data-bs-config='{"popperConfig":{"strategy":"fixed"}}'
            @endif
            :class="btnClasses()"
            :id="id"
            :style="(width && width!='fit-content')?('width:'+width) :'' "
            x-ref="dropdown-btn"
            
            {{-- @click="toggleSelect()" --}}
           
            

        >
            <div class="text-truncate ">
                
                <i class="bi me-2 " :class="'bi-'+icon+' '+(value?'':'opacity-50') " x-show="icon"></i>
                <i class="bi" :class="value" x-show="value"></i> 
                <span x-html="value ? value  : placeholder" :class="{'opacity-50':!value}" ></span>
                
            </div>
            <span  x-cloak :class="{'opacity-0 pe-none':!(allowClear && value), 'ms-auto': width!='fit-content', 'ms-2': width=='fit-content'}" :visibility="{'hidden':!(allowClear && value)}"  @click.prevent.stop="clear" class="text-reset  z-10  align-self-end" ><i class="bi bi-x"></i></span>
        
        </button>
        
        
        
        <input type="hidden" x-ref="icon-input" :value="value" name="{{$name}}"  />
        
        <ul 
            class="dropdown-menu layout-{{$grid?'grid':'list'}} {{$menuClass??''}}" 
            :class="{'show':open}"
            x-cloak
            x-ref="dropdown"
            
            x-trap.noreturn="search && open"
                
            >

                <div class="px-2 pb-2 pt-2 pt-sm-0" x-show="search">
                    <x-t-text 
                        icon="search" 
                        placeholder="Type to search..." 
                        x-model.debounce="term" 
                        allowClear 
                        x-ref="searchInput"
                    />
                </div>

            <div  class="relative opacity-75 small px-3 p-2" x-show="isLoading" >
                <div class="spinner-border spinner-border-sm text-primary" role="status">
                    <span class="visually-hidden" >Loading...</span>
                </div>
                <span>Loading...</span>
            </div>

            <div  class="relative icons-container overflow-y-auto options-container" x-show="!isLoading" :style="('grid-template-columns: repeat('+grid.cols+', 1fr)') + ';'+ (height ? 'max-height:'+height : '') " >

                <template x-for="(icon,index) in options" :key="index">
                    <li class="list-option">
                        <a class="dropdown-item" :class="{'selected':isSelected(icon), 'active':isSelected(icon) && grid && grid!='list'}" type="button" @click="selectIcon(icon)">
                            <i class="bi icon-icon" :class="icon" :title="icon"></i> <span class="icon-label" x-text="icon"></span>

                            <i class="check-icon bi float-end" x-show="!grid || grid=='list'" :class="isSelected(icon)?'bi-check':''"></i>
                            
                        </a>
                    </li>
                </template>
                <div x-intersect="loadMore()" class="p-3 p-sm-2 opacity-50 mt-2" :style="'grid-column: 1 / '+(grid.cols+1)+';'" x-show="!allLoaded"><small>Loading...</small></div>
            </div>
        </ul>
    </span>
</span>

@include('t-components::components.'.config('t-components.theme').'.forms._input_error')