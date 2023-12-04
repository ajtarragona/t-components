<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Textareas</h1>
        <p class="lead">Camps de text gran. </p>
         <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-textarea/&gt;</code></p>
            
        </p>
    </div>
    <div>
       
    </div>
</div>

<hr />
<div class="d-block d-sm-flex justify-content-between">
  <div>
  </div>
  <div>
      <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#src-viewer-container" aria-controls="src-viewer-container"
          wire:click="openSrc('t-components::docs.sections.src.forms.textareas.basic')">
          <i class="bi bi-code-square"></i> View Source
      </button>
  </div>
</div>

@include('t-components::docs.sections.src.forms.textareas.basic')

