@if (session('formRequest'))
    <div class="position-fixed end-0 alert alert-info m-2 z-3 alert-dismissible" role="alert" style="top:60px;"
        wire:ignore>
        <pre>{{ var_export(session('formRequest')) }}</pre>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif