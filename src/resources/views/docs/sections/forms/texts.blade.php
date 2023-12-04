<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Text inputs</h1>
        <p class="lead">
            Camps de text. Fem servir l'etiqueta <code>&lt;x-t-text/&gt;</code></p>
        <p class="lead"> documentació <a href="https://getbootstrap.com/docs/5.3/forms/form-control/"
                target="_blank" class="text-decoration-none">Bootstrap</a>
        </p>
    </div>
    <div>
       
    </div>
</div>

<hr />
<div class="d-block d-sm-flex justify-content-between">
 <div></div>
  <div>
      <button class="btn btn-secondary btn-sm mb-2" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#src-viewer-container" aria-controls="src-viewer-container"
          wire:click="openSrc('t-components::docs.sections.src.forms.texts.basic')">
          <i class="bi bi-code-square"></i> View Source
      </button>
  </div>
</div>

@include('t-components::docs.sections.src.forms.texts.basic')


<hr />
<div class="d-block d-sm-flex justify-content-between">
  <div>
    <h2>Sizes</h2>
  </div>
  <div>
      <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#src-viewer-container" aria-controls="src-viewer-container"
          wire:click="openSrc('t-components::docs.sections.src.forms.texts.sizes')">
          <i class="bi bi-code-square"></i> View Source
      </button>
  </div>
</div>

@include('t-components::docs.sections.src.forms.texts.sizes')



<hr />
<div class="d-block d-sm-flex justify-content-between">
  <div>
    <h2>Colors</h2>
  </div>
  <div>
      <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#src-viewer-container" aria-controls="src-viewer-container"
          wire:click="openSrc('t-components::docs.sections.src.forms.texts.colors')">
          <i class="bi bi-code-square"></i> View Source
      </button>
  </div>
</div>

@include('t-components::docs.sections.src.forms.texts.colors')

<hr/>

<h2>Floating labels</h2>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
</div>

<div class="form-floating mb-3">
    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
    <label for="floatingTextarea2">Comments</label>
</div>

<div class="form-floating mb-3">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
        <option selected>Open this select menu</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
    <label for="floatingSelect">Works with selects</label>
</div>

