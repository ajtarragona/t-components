
<x-t-modal title="{{$title}}" closer="{{$closer}}" size="{{$size}}" >
    <p>
        Otra modal
    </p>
    
    @slot('footer')
        <div class="d-flex justify-content-between">
            <div><button class="btn btn-light" wire:click="save">Back</button></div>
            <div><button class="btn btn-primary" wire:click="saveAndClose">Close</button></div>
        </div>

    @endslot
</x-t-modal>
