<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Checkboxes</h1>
        <p class="lead">
            Caselles de selecció. 
        </p>
        <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-checkbox/&gt;</code> o <code>&lt;x-t-radio/&gt;</code></p>

    </div>
    <div>
       
    </div>
</div>
<hr/>

@include('t-components::docs._form_request')


<x-t-form action="{{route('t-components.testForm')}}" method="get"> 
    <div class="row mb-2">
        <div class="col-6">
                


            <x-t-checkbox id="ch-nolabel" name="ch-nolabel" />
            
            
            <x-t-checkbox id="ch1" name="ch1" >Default</x-t-checkbox>
            <x-t-checkbox id="ch1-checked" name="ch1-checked[]" value="1" checked >Checked</x-t-checkbox>
            <x-t-checkbox id="ch1-icon" name="ch1-checked[]" value="2"  icon="star">With icon</x-t-checkbox>
            <x-t-checkbox id="ch1-dis" name="ch1-checked[]" value="3"  disabled>Disabled</x-t-checkbox>
            <x-t-checkbox id="sw-1" name="ch1-checked[]" value="4"  switch >Switch</x-t-checkbox>
            
            <x-t-checkbox id="ch-ind" name="ch-ind" indeterminate required >Indeterminate</x-t-checkbox>
            
         
            
            
            
            
        </div>
        <div class="col-6">
            
            
            <x-t-radio id="radio-1-0" value="0" name="radio-1" />
            <x-t-radio id="radio-1-1" name="radio-1" value="1" >Amb label</x-t-radio>
            <x-t-radio id="radio-1-c0" value="-1" name="radio-1" checked >Checked</x-t-radio>
            <x-t-radio id="radio-1-2" name="radio-1" value="2" disabled >Opció disabled</x-t-radio>
            <x-t-radio id="radio-1-3" name="radio-1" value="3" switch >Opció Switch</x-t-radio>
            <x-t-radio id="radio-1-4" name="radio-1" value="4"  icon="star" switch>With icon</x-t-radio>
        </div>
            
    </div>


    <hr/>

    <h5>Mides</h5>

    <div class="row mb-2">
        <div class="col-6">
            <x-t-checkbox id="ch-size-sm" name="ch-size" value="sm" size="sm">Small</x-t-checkbox>
            <x-t-checkbox id="ch-size-md" name="ch-size" value="md" size="md">Medium (default)</x-t-checkbox>
            <x-t-checkbox id="ch-size-lg" name="ch-size" value="lg" size="lg">Large</x-t-checkbox>
            
            <x-t-checkbox id="ch-size-sm-s" switch name="ch-size" value="sm" size="sm">Small</x-t-checkbox>
            <x-t-checkbox id="ch-size-md-s" switch name="ch-size" value="md" size="md">Medium (default)</x-t-checkbox>
            <x-t-checkbox id="ch-size-lg-s" switch name="ch-size" value="lg" size="lg">Large</x-t-checkbox>

            
        </div>
        <div class="col-6">
            <x-t-radio id="r-size-sm" name="r-size" value="sm" size="sm">Small</x-t-checkbox>
            <x-t-radio id="r-size-md" name="r-size" value="md" size="md">Medium (default)</x-t-checkbox>
            <x-t-radio id="r-size-lg" name="r-size" value="lg" size="lg">Large</x-t-checkbox>
            
            <x-t-radio id="r-size-sm-s" switch name="r-size" value="sm" size="sm">Small</x-t-checkbox>
            <x-t-radio id="r-size-md-s" switch name="r-size" value="md" size="md">Medium (default)</x-t-checkbox>
            <x-t-radio id="r-size-lg-s" switch name="r-size" value="lg" size="lg">Large</x-t-checkbox>
                
        </div>
    </div>
    <hr/>

    <h5>Colors</h5>

    <div class="row mb-2">
        <div class="col-6">
            <x-t-checkbox id="ch-primary" name="ch-primary" color="primary">Primary</x-t-checkbox>
            <x-t-checkbox id="ch-secondary" name="ch-secondary" color="secondary">Secondary</x-t-checkbox>
            <x-t-checkbox id="ch-success" name="ch-success" color="success">success</x-t-checkbox>
            <x-t-checkbox id="ch-warning" name="ch-warning" color="warning">warning</x-t-checkbox>
            <x-t-checkbox id="ch-danger" name="ch-danger" color="danger">danger</x-t-checkbox>
            <x-t-checkbox id="ch-info" name="ch-info" color="info">info</x-t-checkbox>
            <x-t-checkbox id="ch-dark" name="ch-dark" color="dark">dark</x-t-checkbox>
            <x-t-checkbox id="ch-light" name="ch-light" color="light">light</x-t-checkbox>
            
            
            <x-t-checkbox id="sw-primary" name="ch-primary" color="primary" switch>Primary</x-t-checkbox>
            <x-t-checkbox id="sw-secondary" name="ch-secondary" color="secondary" switch>Secondary</x-t-checkbox>
            <x-t-checkbox id="sw-success" name="ch-success" color="success" switch>success</x-t-checkbox>
            <x-t-checkbox id="sw-warning" name="ch-warning" color="warning" switch>warning</x-t-checkbox>
            <x-t-checkbox id="sw-danger" name="ch-danger" color="danger" switch>danger</x-t-checkbox>
            <x-t-checkbox id="sw-info" name="ch-info" color="info" switch>info</x-t-checkbox>
            <x-t-checkbox id="sw-dark" name="ch-dark" color="dark" switch>dark</x-t-checkbox>
            <x-t-checkbox id="sw-light" name="ch-light" color="light" switch>light</x-t-checkbox>

        </div>
        <div class="col-6">
       
            <x-t-radio id="radio-primary" name="radio-2" value="primary" checked color="primary">Primary</x-t-radio>
            <x-t-radio id="radio-secondary" name="radio-2" value="secondary"  color="secondary">Secondary</x-t-radio>
            <x-t-radio id="radio-success" name="radio-2" value="1"  color="success">success</x-t-radio>
            <x-t-radio id="radio-warning" name="radio-2" value="1"  color="warning">warning</x-t-radio>
            <x-t-radio id="radio-danger" name="radio-2" value="1"  color="danger">danger</x-t-radio>
            <x-t-radio id="radio-info" name="radio-2" value="1"  color="info">info</x-t-radio>
            <x-t-radio id="radio-dark" name="radio-2" value="1"  color="dark">dark</x-t-radio>
            <x-t-radio id="radio-light" name="radio-2" value="1"  color="light">light</x-t-radio>
            
            
            <x-t-radio id="radio-sw-primary" name="radio-3" value="1"  color="primary" switch>Primary</x-t-radio>
            <x-t-radio id="radio-sw-secondary" name="radio-3" value="1"  color="secondary" switch>Secondary</x-t-radio>
            <x-t-radio id="radio-sw-success" name="radio-3" color="success" switch>success</x-t-radio>
            <x-t-radio id="radio-sw-warning" name="radio-3" color="warning" switch>warning</x-t-radio>
            <x-t-radio id="radio-sw-danger" name="radio-3" color="danger" switch>danger</x-t-radio>
            <x-t-radio id="radio-sw-info" name="radio-3" color="info" switch>info</x-t-radio>
            <x-t-radio id="radio-sw-dark" name="radio-3" color="dark" switch>dark</x-t-radio>
            <x-t-radio id="radio-sw-light" name="radio-3" color="light" switch>light</x-t-radio>
            
        </div>
    </div>
    <button type="submit" class="btn btn-primary my-3">Test form</button>


</x-t-form>

