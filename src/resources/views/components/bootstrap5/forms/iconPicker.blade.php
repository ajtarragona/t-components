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
    'name'=>null,
    'id'=>null,
    'size' => 'md',
    'placeholder' => 'Select an icon',
    'search' => false,
    'layout'=>'list'
    
])

<span 
 class="t-select t-icon-picker flex-grow-1 {{$attributes["outer-class"]??''}}"
    x-data="tIconPicker({
        color: '{{ $color }}',
        class: '{{ $class }}',
        size: '{{ $size }}',
        outerClass: '{{ $outerClass }}',
        icon: '{{ $icon }}',
        name: '{{ $name }}',
        id: '{{ $id }}',
        layout: '{{ $layout }}',
        allowClear: {{ $allowClear ? 'true':'false' }},
        placeholder: '{{ addslashes($placeholder) }}',
        width: {{ $width ? '\''.$width.'\'' :'false' }},
        search: {{ $search ? 'true':'false' }},
        value:  @if($attributes->whereStartsWith('wire:model')->first())  @entangle($attributes->wire('model'))  @else  {{ $value?('\''.$value.'\'') : 'null' }} @endif 
    })"

    @click.away="closeDropdown()" 
    @keydown.escape="closeDropdown()"
>   
    <span class="dropdown {{$width=='fit-content'?'d-inline-block':''}}" :class="outerClass + (!width?' d-block': '')" :style="(width && width!='fit-content')? width: '' " >

        <button 
                
            type="button"
            class="btn dropdown-toggle t-select-dropdown d-flex align-items-center justify-content-start {{((isset($attributes["name"]) && $errors->has($attributes["name"]) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':'')}}"
            data-bs-toggle="dropdown"
            data-bs-auto-close="true"
            :class="btnClasses()"
            :id="id"
            :style="(width && width!='fit-content')?('width:'+width) :'' "
            x-ref="dropdown-btn"
            
            {{-- @click="toggleSelect()" --}}
            @focus="focused=true" 
            @blur="focused=false"

        >
            <div class="text-truncate ">
                
                <i class="bi me-2 " :class="'bi-'+icon+' '+(hasValue?'':'opacity-50') " x-show="icon"></i>
                <i class="bi" :class="value" x-show="hasValue"></i> 
                <span x-html="hasValue ? value  : placeholder" :class="{'opacity-50':!hasValue}" ></span>
                
            </div>
            <span :class="{'opacity-0 pe-none':!(allowClear && hasValue), 'ms-auto': width!='fit-content', 'ms-2': width=='fit-content'}" :visibility="{'hidden':!(allowClear && hasValue)}"  @click.prevent.stop="clear" class="text-reset  z-10  align-self-end" ><i class="bi bi-x"></i></span>
        
        </button>
        
        
        @if($name)
            <input type="hidden" x-ref="icon-input" :value="value" />
        @endif
        
        <ul 
            class="dropdown-menu layout-{{$layout}} "
            :class="{'show':open}"
            x-cloak
            x-ref="dropdown"
            
            x-trap.noreturn="search && open"
                
            >

                <div class="px-2 pb-2" x-show="search">
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

            <div  class="relative icons-container overflow-y-auto" x-show="!isLoading" style="{{ $height ? 'max-height:'.$height:'' }}" >

                <template x-for="(icon,index) in options" :key="index">
                    <li >
                        <a class="dropdown-item p-2 " :class="{'active':isSelected(icon)}" type="button" @click="selectIcon(icon)">
                            <i class="bi icon-icon" :class="icon" :title="icon"></i> <span class="icon-label" x-text="icon"></span>
                            <i class="bi bi-check float-end check-icon" x-show="isSelected(icon)"></i>

                        </a>
                    </li>
                </template>
            </div>
        </ul>
    </span>
</span>

@include('t-components::components.'.config('t-components.theme').'.forms._input_error')