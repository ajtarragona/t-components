<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Fields</h1>
        <p class="lead">
            Aquest component ens permet envolcallar la resta de components de formulari amb l'estructura proposada per bootstrap.
            Així podem afegir una etiqueta, text d'ajuda, missatges d'error, etc.
        </p>
        <p class="lead">
            Fem servir l'etiqueta <code>&lt;x-t-field&gt;...&lt;/x-t-field&gt;</code>
        </p>
        
        
    </div>
    <div>
       
    </div>
</div>

<hr />
<div class="d-block d-sm-flex justify-content-between">
  <div>
    
  </div>
  <div class="pb-2">
      <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#src-viewer-container" aria-controls="src-viewer-container"
          wire:click="openSrc('t-components::docs.sections.src.forms.fields')">
          <i class="bi bi-code-square"></i> View Source
      </button>
  </div>
</div>

@include('t-components::docs._form_request')

@include('t-components::docs.sections.src.forms.fields')
