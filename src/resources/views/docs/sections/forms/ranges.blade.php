<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Ranges</h1>
        <p class="lead">
            Sliders numèrics. 
        </p>
        <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-range/&gt;</code> o <code>&lt;x-t-range/&gt;</code></p>

    </div>
    <div>
       
    </div>
</div>
<hr/>
@include('t-components::docs._form_request')


<x-t-form action="{{route('t-components.testForm')}}" method="get"> 

    <x-t-range id="rg-1" name="rg-1"/>

    <x-t-field label="Example range" for="rg-1" label-placement="start" boxed class="mb-2">
        <x-t-range id="rg-1" name="rg-1"/>
    </x-t-field>


    <x-t-field label="Disabled" for="rg-2" label-placement="start" boxed class="mb-2">
        <x-t-range id="rg-2" disabled name="rg-2"/>
    </x-t-field>


    <x-t-field label="Min and max" for="rg-3" label-placement="start" boxed class="mb-2">
        <x-t-range id="rg-3" min="1" max="3" name="rg-3"/>
    </x-t-field>

    <x-t-field label="Steps" for="rg-4" label-placement="start" boxed class="mb-2">
        <x-t-range id="rg-4" min="1" max="3" name="rg-4" step="0.1"/>
    </x-t-field>

    <x-t-field label="Livewire value({{ $dummyNumber }})" for="rg-wire" label-placement="start" boxed class="mb-2">
        <x-t-range id="rg-wire" min="0" max="20" wire:model.live="dummyNumber"/>
        
    </x-t-field>



    <x-t-button icon="save" type="submit">Submit</x-t-button>

   
</x-t-form>

<hr/>
<h5>Colors</h5>

<div class="row">
    <div class="col-6">
        <x-t-range color="primary"/>
        <x-t-range color="secondary"/>
        <x-t-range color="info"/>
        <x-t-range color="danger"/>
        <x-t-range color="warning"/>
        <x-t-range color="success"/>
        <x-t-range color="dark"/>
        <x-t-range color="light"/>
    </div>
    <div class="col-6">
        <x-t-field boxed class="mb-2">
            <x-t-range color="primary"/>
            <x-t-range color="secondary"/>
            <x-t-range color="info"/>
            <x-t-range color="danger"/>
            <x-t-range color="warning"/>
            <x-t-range color="success"/>
            <x-t-range color="dark"/>
            <x-t-range color="light"/>
        </x-t-field>
        
    </div>
</div>
