
<x-t-text type="email" icon="envelope" name="kakaka" placeholder="name@example.com"/>


    

<div class="mt-3">
    <label for="text-wire" class="form-label">Wire model</label>

    <div class="input-group ">
        <x-t-text type="text" outer-class="flex-grow-1" id="text-wire" wire:model.live="dummy" placeholder="wire model"/>
    
        <span class="input-group-text" >Valor: {{ $dummy}}</span>
    </div>

</div>

<div class="mt-3">
    <label for="text-allow-clear" class="form-label">Clearable</label>

    <x-t-text type="text" outer-class="flex-grow-1" id="text-allow-clear" placeholder="allowClear" allowClear />
    

</div>


<div class="mt-3">
    <label for="text-allow-clear" class="form-label">Maxlength</label>

    <x-t-text type="text" outer-class="flex-grow-1" id="text-allow-clear" maxlength="10" placeholder="maxlength" allowClear />
    

</div>