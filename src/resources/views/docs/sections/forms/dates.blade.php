    <div class="d-block d-sm-flex justify-content-between">
        <div>
            <h1>Dates</h1>
            <p class="lead">
                Camps de data. 
            </p>
            <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-date/&gt;</code></p>
            <p class="lead">Veure documentació llibreria  <a href="https://flatpickr.js.org/" class="text-decoration-none" external target="_blank">flatpickr.js</a> </p>

        </div>
        <div>
        
        </div>
    </div>
    <hr/>


<x-t-form action="{{route('t-components.testForm')}}" method="get"> 
    
            @include("t-components::docs._docs_section",['title'=>"Flatpicker","path"=>"forms.dates.simple"])
            
            <hr/>
    
            @include("t-components::docs._docs_section",['title'=>"Disabled","path"=>"forms.dates.disabled"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Natiu","path"=>"forms.dates.native"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Temps","path"=>"forms.dates.times"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Format de visualització","path"=>"forms.dates.formats"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Camp amb valor inicial","path"=>"forms.dates.initial"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Permet escriure","path"=>"forms.dates.writable"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Clearable","path"=>"forms.dates.clearable"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Data minima i màxima","path"=>"forms.dates.minmax"])

            <hr/>
            @include("t-components::docs._docs_section",['title'=>"Rang","path"=>"forms.dates.range"])

           
            <hr/>
            @include("t-components::docs._docs_section",['title'=>"Multiples dates","path"=>"forms.dates.multiple"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Colors","path"=>"forms.dates.colors"])

            <hr/>

            @include("t-components::docs._docs_section",['title'=>"Lligat amb Livewire","path"=>"forms.dates.livewire"])

            
           
    
    <x-t-button icon="save" type="submit" class="mt-3">Submit</x-t-button>
    @if(session('formRequest'))
        <div class="mt-2" wire:ignore>@dump(session('formRequest'))</div>
    @endif
</x-t-form>



