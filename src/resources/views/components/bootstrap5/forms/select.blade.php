{{-- @extends('t-components::components.bootstrap5.forms.input_layout')
@section('input-body') --}}
{{-- @dump($dataOptions??[]) --}}
        
    @if(!$native)
        
        <div class="flex-grow-1 t-select {{ $overlayColor?('overlay-'.$overlayColor) : '' }}" :class="{'overlay':overlay, 'opened':open,'with-search':search}"
            x-modelable="selected"
            {{ $attributes->whereStartsWith('x-') }}

            x-on:t-select-set.window="setAttribute(event)"
            x-on:t-select-reload.window="reload(event)"

            x-data='tSelectComponent(@json($properties()))'
            
        
            
        

            
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
                    class="btn dropdown-toggle t-select-dropdown d-flex align-items-center justify-content-start {{(($errorname && $errors->has($errorname) || ( $attributes->whereStartsWith('wire:model')->first() && $errors->has($attributes->whereStartsWith('wire:model')->first())  ))  ? 'is-invalid':'')}}"
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
                    <span :class="{'opacity-0 pe-none':!(allowClear && hasSelected()), 'ms-auto': width!='fit-content', 'ms-2': width=='fit-content'}" :visibility="{'hidden':!(allowClear && hasSelected())}"  @click.prevent.stop="clearSelected" class="text-reset  z-10  align-self-end" x-cloak ><i class="bi bi-x"></i></span>
                
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
                            <div x-intersect.margin.200px="await loadMore()"  class="relative opacity-75 small p-3" x-show="isLoading || (lazyLoad && !allLoaded)" >
                                <div class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="visually-hidden" x-text="loadingMessage"></span>
                                </div>
                                <span x-text="loadingMessage"></span>
                            </div>

                        </div>
                    </div>
                </ul>
                <select :multiple="multiple" :name="name" :disabled="disabled" :readonly="readonly" hidden class="form-select"  x-ref="selectInput">
                    <option value=''>-</option>

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
                    <template x-for="(option,key) in Object.values(dataOptions)" >
                        <option :value="option.key" x-text="option.value" :selected="isSelected(option.key)"></option>
                    </template>
                    {{-- @endif --}}

                </select>
            </span>
        </div>
    @else
        {{-- @dump($dataOptions??[]) --}}
        <select id="{{$id}}" name="{{$name}}" {{ $multiple?'multiple':''}}  {{$attributes->whereStartsWith('x-on')}}  class="form-select {{$class}}">
            @foreach($dataOptions??[] as $key=>$value)
                <option value="{{$key}}" {{$selected==$key?'selected':''}}>{{$value}}</option>
            @endforeach
        </select>
    @endif

    @include('t-components::components.'.config('t-components.theme').'.forms._input_error')

{{-- @endsection --}}