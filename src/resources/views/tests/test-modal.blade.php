
<x-t-modal title="{{$title}}" closer="{{$closer}}" size="{{$size}}" >
    <p>{!! $text !!}</p>
    <input class="form-control" type="text" />
    
    @slot('footer')
        <button class="btn btn-primary" wire:click="$dispatch('openModal', { component:'t-components-test-modal-2', attributes: {{ json_encode(['closeOnClickOutside'=>true,'size'=>'lg','closeOnEscape'=>true,'text'=>'Jandemore']) }} } )">Open another modal</button>
    @endslot

</x-t-modal>
