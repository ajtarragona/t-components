@isset($attributes['multiple'])
    <li >
        <a class="dropdown-item pe-2" type="button"
            :class="optionClass(option.key,index)"
            @click.prevent.stop="selectOption(option.key)"
            >
            
            <i class="bi me-2" :class="'bi-'+option.icon??false" x-show="option.icon??false"></i> 
            
            <span x-html="option.value"></span>

            
            <i class="bi bi-check float-end" x-show="isSelected(option.key)"></i>
        </a>
    </li>
    @else
    <li >
        <a class="dropdown-item pe-2" type="button"
            :class="optionClass(option.key,index)"
            @click.prevent.stop="selectOption(option.key)"
            >
            
            <i class="bi me-2" :class="'bi-'+option.icon??false" x-show="option.icon??false"></i> 
            <span x-html="option.value"></span>

            <i class="bi bi-check float-end" x-show="isSelected(option.key)"></i>
        </a>
    </li>
@endisset