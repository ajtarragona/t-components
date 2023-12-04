<div 
    x-data="LivewireUIModal()"
    
>

    <div class="modal-backdrop fade" :class="{ 'show': show }" x-show="show"></div>
   
    <div class="modal fade " :class="{ 'show': show }"  tabindex="-1" 
        
        
        x-on:keydown.escape.window="closeModalOnEscape()"
        x-show="show"
        x-transition:enter.opacity.duration.500ms
        x-transition:leave.opacity.duration.500ms
        role="dialog"
        aria-modal="true"
        
    >
   
        <div  x-trap.noscroll.inert="show && showActiveComponent"
            x-on:click.outside="closeModalOnClickOutside()"
        
        >
                @forelse($components as $id => $component)
                    <div x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                        @livewire($component['name'], $component['attributes'], key($id))
                    </div>
                @empty
                @endforelse
            
        </div>
      </div>

    
</div>