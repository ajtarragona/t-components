@isset($attributes['multiple'])
    <li class="list-option">
        <a class="dropdown-item pe-sm-2 " type="button" 
            :disabled="option.disabled??false"
            :class="optionClass(option.key,index)"
            @click.prevent.stop="selectOption(option.key)"
            >
            
            <i class="bi me-2" :class="'bi-'+option.icon??false" x-show="option.icon??false"></i> 
            
            <span x-html="option.value"></span>

            
            <i class="check-icon  bi float-end" :class="isSelected(option.key)?'bi-check':''"></i>
        </a>
    </li>
@else
    <li class="list-option">
        <a class="dropdown-item pe-sm-2" type="button"
            :disabled="option.disabled??false"
            :class="optionClass(option.key,index)"
            @click.prevent.stop="selectOption(option.key)"
            >
            
            <i class="bi me-2" :class="'bi-'+option.icon??false" x-show="option.icon??false"></i> 
            <span x-html="option.value"></span>

            <i class="check-icon  bi float-end" :class="isSelected(option.key)?'bi-check':''"></i>
        </a>
    </li>
@endisset