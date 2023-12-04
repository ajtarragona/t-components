
    <h1 >Modals</h1> 
    <div id="modals-tests">

        {{-- {{ json_encode(['closeOnClickOutside'=>false,'closeOnEscape'=>false]) }} --}}
       
       @include('t-components::docs.sections.src.components.modals')
       
       

       <hr/>


       <button 
       class="btn btn-secondary btn-sm" 
           type="button" data-bs-toggle="offcanvas" data-bs-target="#src-viewer-container"
           aria-controls="src-viewer-container" wire:click="openSrc('t-components::docs.sections.src.components.modals')">
           <i class="bi bi-code-square"></i> View Source
       </button>
    </div>