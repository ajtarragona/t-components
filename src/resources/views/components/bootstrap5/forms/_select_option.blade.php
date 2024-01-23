@isset($attributes['multiple'])
    <li class="list-option">
        <a class="dropdown-item pe-sm-2 " type="button" 
            :disabled="option.disabled??false"
            :class="optionClass(option.key,index)"
            @click.prevent.stop="selectOption(option.key)"
            >
            <div class="d-flex justify-content-between">
                <div class="flex-grow-1 text-truncate pe-2">
                    <i class="bi me-2" :class="'bi-'+option.icon??false" x-show="option.icon??false"></i> 
                
                    <span class="text-truncate" x-html="option.value"></span>
                    <div class="text-gray-500 " style="white-space:normal" x-cloak x-show="option.description??false"><small x-html="option.description??''"></small></div>

                </div>
                <div>
                    <i class="check-icon  bi float-end" :class="isSelected(option.key)?'bi-check':''"></i>
                </div>
            </div>
        </a>
    </li>
@else
    <li class="list-option">
        <a class="dropdown-item pe-sm-2" type="button"
            :disabled="option.disabled??false"
            :class="optionClass(option.key,index)"
            @click.prevent.stop="selectOption(option.key)"
            >
            
            <div class="d-flex justify-content-between">
                <div class="flex-grow-1 text-truncate pe-2">
                    <i class="bi me-2" :class="'bi-'+option.icon??false" x-show="option.icon??false"></i> 
                
                    <span class="text-truncate" x-html="option.value"></span>
                    <div class="text-gray-500" style="white-space:normal" x-cloak x-show="option.description??false"><small x-html="option.description??''"></small></div>
                </div>
                <div>
                    <i class="check-icon  bi float-end" :class="isSelected(option.key)?'bi-check':''"></i>
                </div>
            </div>
            
        </a>
    </li>
@endisset