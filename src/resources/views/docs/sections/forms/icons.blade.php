    <div class="d-block d-sm-flex justify-content-between">
        <div>
            <h1>Icon pickers</h1>
            <p class="lead">
                Camps de selecció d'icones. 
            </p>
            <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-iconPicker/&gt;</code></p>
            <p class="lead">Veure documentació  <a href="https://icons.getbootstrap.com//" class="text-decoration-none" external target="_blank">Icones Bootstrap 5</a> </p>

        </div>
        <div>
        
        </div>
    </div>
    <hr/>

<x-t-iconPicker name="icon1" />

<hr/>
<h5>With default value</h5>
<p>Pots donar un valor per defecte amb l'atribut <code>value</code>.</p>
<x-t-iconPicker name="icon1" allow-clear value="bi-badge-8k" placeholder="default value"/>


<hr/>
<h5>Livewire</h5>
<div class="input-group">
    <x-t-iconPicker wire:model.live="dummy" allow-clear placeholder="livewire"/> 
    <span class="input-group-text" >@if($dummy)<i class="bi {{$dummy}}"></i>@endif</span>
</div>


<hr/>
<h5>Botó per netejar</h5>
<p>Podem habilitar una creueta per netejar el valor amb l'atribut <code>allow-clear</code>, tant per selects simples com múltiples.</p>
<x-t-iconPicker name="icon1" allow-clear placeholder="allow-clear"/>
<hr/>

<h5>Width</h5>
<p>Podem definir l'amplada, com amb els camps select.</p>

<x-t-iconPicker  allow-clear placeholder="width=300px" width="300px" class="mb-2"/>
<x-t-iconPicker  allow-clear placeholder="width=fit-content" width="fit-content"/>

<hr/>
<h5>Colors i mida</h5>
<p>Podem definir colors i mides, com amb els camps select.</p>
<div class="row mb-3 g-1">
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear  color="primary" placeholder="color=primary"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear  color="secondary" placeholder="color=secondary"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear color="info" placeholder="color=info"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear color="success" placeholder="color=success"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear color="danger" placeholder="color=danger"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear color="warning" placeholder="color=warning"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear color="light" placeholder="color=light"/>
    </div>
    <div class="col-sm-3">
        <x-t-iconPicker  allow-clear color="dark" placeholder="color=dark"/>
    </div>
</div>
<div class="row mb-3 g-1">
    <div class="col-sm-4">
        <x-t-iconPicker  allow-clear size="sm" placeholder="size=sm" />
    </div>
    <div class="col-sm-4">
        <x-t-iconPicker  allow-clear size="md" placeholder="size=md" />
    </div>
    <div class="col-sm-4">
        <x-t-iconPicker  allow-clear size="lg" placeholder="size=lg" />
    </div>
</div>

<hr/>
<h5>Icona del camp</h5>
<p>Podem definir la icona del propi camp, com amb els camps select.</p>
<x-t-iconPicker name="icon1" icon="star"/>

<hr/>
<h5>Search</h5>
<p>Pots habilitar la cerca amb l'atribut <code>search</code>.</p>

<x-t-iconPicker name="icon1" search/>

<hr/>

<h5>Grid display</h5>
<p>Pots fer que les icones es vegin en format graella amb l'atribut <code>grid</code>, passant un string en el format COLUMNESxFILES.</p>
<x-t-iconPicker name="icon1" grid="10x10" search placeholder="grid=10x10" allowClear/>
<x-t-iconPicker name="icon1" grid="5x3" search placeholder="grid=5x3" allowClear/>

<hr>
<hr>