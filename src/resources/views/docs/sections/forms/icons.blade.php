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

<x-t-iconPicker name="icon1" icon="star"/>
<x-t-iconPicker name="icon1" allowClear value="bi-archive" placeholder="default value"/>

<div class="input-group">
    <x-t-iconPicker wire:model="dummy" allowClear placeholder="livewire"/>
    
    <span class="input-group-text" >@if($dummy)<i class="bi {{$dummy}}"></i>@endif</span>
</div>

<x-t-iconPicker name="icon1" allowClear placeholder="allowClear"/>
<x-t-iconPicker name="icon1" allowClear placeholder="allowClear" width="300px"/>
<x-t-iconPicker name="icon1" allowClear placeholder="allowClear" width="fit-content"/>
<x-t-iconPicker name="icon1" allowClear size="lg" color="info"/>
<x-t-iconPicker name="icon1" search/>

<hr/>

<x-t-iconPicker name="icon1" layout="grid" placeholder="layout=grid"/>
<x-t-iconPicker name="icon1" layout="grid" search allowClear/>