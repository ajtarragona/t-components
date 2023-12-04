<p>Funciona amb Livewire fent senvir <code>wire:model</code>.</p>
<div class="input-group">
    <x-t-date wire:model="dummy" allowClear name="flat-wired" placeholder="wire:model"/>
    
    <span class="input-group-text" >{{$dummy??''}}</span>
</div>
    