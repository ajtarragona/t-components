<div class="mb-5">
    <div class="d-block d-sm-flex justify-content-between">
        <div>
            <h1>Forms</h1>
            <p class="lead">
                Aquest component ens permet crear formularis
            </p>
            <p class="lead">
                Fem servir l'etiqueta <code>&lt;x-t-form&gt;...&lt;/x-t-form&gt;</code>
            </p>

            <p class="lead">
                Veure documentació <a href="https://getbootstrap.com/docs/5.3/forms/form-control/"
                target="_blank" external class="text-decoration-none">Bootstrap</a>
            </p>
        </div>
        <div>
        
        </div>
    </div>

    <hr />
    @include('t-components::docs._form_request')


    <h5>Formularis</h5>

    <x-t-form action="{{route('t-components.testForm')}}" method="get" > 
        <x-t-field label="Camp de text" label-placement="start"  for="f1-tf-1" class="mb-2" field-error="f1-tf-1">
            <x-t-text id="f1-tf-1" name="f1-tf-1"/>
        </x-t-field>

        <x-t-button icon="save" type="submit">Submit</x-t-button>
        

    </x-t-form>

    <hr/>

    <h5>Validació</h5>
    <x-t-form action="{{route('t-components.validatedForm')}}" method="post" > 
        <x-t-field label="Camp obligatori" label-placement="start"  required for="f2-tf-1" class="mb-2">
            <x-t-text id="f2-tf-1"   name="f2-tf-1"/>
        </x-t-field>
        <x-t-field label="Camp mida màxima" label-placement="start"  for="f2-tf-2" class="mb-2">
            <x-t-text id="f2-tf-2" name="f2-tf-2"/>
        </x-t-field>

        <x-t-button icon="save" type="submit">Submit</x-t-button>
        
    </x-t-form>

    <hr/>



    <h5>Validació Livewire</h5>
    @livewire('t-components-test-form')



    <hr/>




</div>