

<h2>Color</h2>

<label for="exampleColorInput" class="form-label">Color picker</label>
<div class="input-group">
    <div>
    <input type="color" class="form-control form-control-color " wire:model="dummy" id="exampleColorInput" value="#563d7c"
    title="Choose your color">
    </div>
    <span class="input-group-text" >{{$dummy}}</span>
</div>
<hr />