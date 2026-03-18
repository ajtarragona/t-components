<button class="btn btn-primary" wire:click="$dispatch('openModal', {component: 't-components-test-modal'})">Open modal</button>
<button class="btn btn-secondary" wire:click="$dispatch('openModal', {component: 't-components-test-modal', attributes: {'text':'Another text'}})">Open modal 2</button>
