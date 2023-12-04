<div class="d-block d-sm-flex justify-content-between">
    <div><h5>{{$title??''}}</h5></div>
    <div>
        <button class="btn btn-secondary btn-sm mb-2" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#src-viewer-container" aria-controls="src-viewer-container"
            wire:click="openSrc('t-components::docs.sections.src.{{$path}}')">
            <i class="bi bi-code-square"></i> View Source
        </button>
    </div>
</div>

@includeIf('t-components::docs.sections.src.'.$path)
       