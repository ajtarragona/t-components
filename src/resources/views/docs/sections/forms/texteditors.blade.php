<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Rich text editors</h1>
        <p class="lead">Camps de text amb format. </p>
         <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-texteditor/&gt;</code></p>
            
        </p>
    </div>
    <div>
       
    </div>
</div>

<hr />

@include('t-components::docs._form_request')


<x-t-form action="{{route('t-components.testForm')}}" method="get"> 

    {{-- <x-t-text  name="texteditor-1" outer-class="mb-2" placeholder="Enter text..."/> --}}
    
    
    <x-t-texteditor  name="editor-normal-1" outer-class="mb-2" placeholder="Enter text..."/>
    <x-t-texteditor  name="editor-normal-height" outer-class="mb-2" placeholder="Fixed height" height="100px" />
    <x-t-texteditor  name="editor-normal-toolbar-advanced" outer-class="mb-2" toolbar="advanced" placeholder="Toolbar advanced"/>
    <x-t-texteditor  name="editor-readonly" outer-class="mb-2" readonly placeholder="Readonly..."/>
    
    
    <x-t-texteditor  name="editor-bubble-1" value="" bubble outer-class="mb-2" placeholder="Bubble"/>

    <x-t-texteditor  name="editor-bubble-2" value="" bubble toolbar="mini" outer-class="mb-2" placeholder="Bubble mini toolbar"/>
   


    <x-t-texteditor  name="editor-wire" wire:model.live="dummy" outer-class="mb-2" placeholder="wire:model"/>


    <div>{{$dummy}}</div>



    <x-t-field label="Camp de text" for="editor-normal-2"  label-placement="start" boxed class="mb-2">
        <x-t-texteditor  name="editor-normal-2" outer-class="mb-2" placeholder="Enter text..."/>
    </x-t-field>


    <x-t-button icon="save" type="submit">Submit</x-t-button>

   
</x-t-form>

