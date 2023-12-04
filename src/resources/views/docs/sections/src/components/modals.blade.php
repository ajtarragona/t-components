<button class="btn btn-primary" wire:click="$emit('openModal', 't-components-test-modal')">Open modal</button>
<button class="btn btn-secondary" wire:click="$emit('openModal', 't-components-test-modal',{'text':'Another text'})">Open modal 2</button>
