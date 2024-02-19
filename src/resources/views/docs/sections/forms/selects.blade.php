@include('t-components::docs._form_request')


<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Selects</h1>
        <p class="lead">
            Camps de selecció.
        </p>
        <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-select/&gt;</code></p>
        <p class="lead">No fem servir cap paquet extern. Simplement es fan servir les Dropdown de bootstrap per emular
            la funcionalitat dels Select.</p>

    </div>
    <div>

    </div>
</div>

<hr />

<x-t-form action="{{ route('t-components.testForm') }}" method="post">
    <p>Fent servir l'etiqueta <code>&lt;x-t-select&gt;</code> crearem un select.<br />
        Les dades es passen com un array clau/valor amb l'atribut <code>:data</code> (Afegim els dos punts per poder
        passar dades PHP).<br />
        També podem passar les dades com un array en que cada opció és un array asociatiu, amb una sèrie d'atributs
        (obligatòriament ha de tenir l'atribut "value", i opcionalment altres com color, icon, disabled ...).</p>

    <x-t-select name="select1"  class="mb-3" :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
    ]" />

    <p>Es pot personalitzar el placeholder amb l'atribut <code>placeholder</code>. </p>   
    <x-t-select name="select-placeholder" class="mb-2" placeholder="Tria una opció, som-hi!" :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
    ]" />


    <p>Podem convertir el select en natiu afegint l'atribut <code>native</code>.</p>

    <x-t-select native name="select-natiu" class="mb-2" :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
    ]" />

    <x-t-select native name="select-natiu" multiple class="mb-2" :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
        4 => 'dddd ddd',
    ]" />
    <button type="submit" class="btn btn-primary my-3">Test form</button>

</x-t-form>



<hr />
@php

$longData=[];
for($i=0;$i<100;$i++) $longData[$i+1]="Option ".($i+1);

@endphp

<h5>Límit d'opcions</h5>
<p>Per rendiment, per defecte es mostraran només les 20 primeres opcions. Podem configurar aquest límit amb l'atribut <code>limit</code> o bé deshabilitar-lo donant-li valor false.</p>
<x-t-select placeholder="limit=5" limit="5" class="mb-2"
    :data-options="$longData" />

<x-t-select placeholder="limit=false" limit="false" class="mb-2"
:data-options="$longData" />


<hr/>


<h5>Lazy load</h5>
<p>Passant l'atribut <code>lazy-load</code> fem que les opcions vagin mostrant-se a mesura que l'usuari fa scroll al desplegable.</p>
<x-t-select placeholder="lazy-load" lazy-load class="mb-2" limit="10"
    :data-options="$longData" />


<hr/>

<h5>Dins d'un contenidor amb overflow</h5>

<p>Si el desplegable el tenim dins un contenidor amb overflow, podem afegir l'atribut <code>overflow</code>.</p>
<div style="padding:10px;width:100%;height:100px;overflow:auto;outline:2px solid cyan">
    <x-t-select placeholder="no overflow" lazy-load class="mb-2" limit="10" :data-options="$longData" />
</div>
<div style="padding:10px;width:100%;height:100px;overflow:auto;outline:2px solid cyan">
    <x-t-select placeholder="overflow" overflow lazy-load class="mb-2" limit="10" :data-options="$longData" />
</div>


<hr/>


<h5>Deshabilitat</h5>
<p>Com a un select natiu, podem deshabilitar-lo afegint l'atribut <code>disabled</code>.</p>
<x-t-select multiple name="select3" disabled selectedLabelLimit="2" class="mb-2" placeholder="disabled" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
    4 => 'dddddd',
    5 => 'eeeeee',
    6 => 'ffffff',
]" />
<p>També podem deshabilitar opcions concretes posant a true l'atribut <code>disabled</code> a cadascuna de les
    opcions.</p>
<x-t-select name="select-disabled-2" class="mb-2" placeholder="with disabled options" :data-options="[
    1 => ['value' => 'aaaaaa'],
    2 => ['value' => 'bbbb ', 'disabled' => true],
    3 => ['value' => 'ccccc', 'disabled' => true],
    4 => ['value' => 'ddddd', 'disabled' => true],
    5 => ['value' => 'eeeee'],
    6 => ['value' => 'fffff'],
]" />
<p>O bé fer-lo de només lectura afegint l'atribut <code>readonly</code>.</p>
<x-t-select multiple name="select4" :selected="[1, 2, 5]" placeholder="readonly" readonly selectedLabelLimit="2" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
    4 => 'dddddd',
    5 => 'eeeeee',
    6 => 'ffffff',
]" />

   
<hr />


<h5>Selects Multiples</h5>
<x-t-form action="{{ route('t-components.testForm') }}" method="post">
    <p>Podem fer el select multiple afegint l'atribut <code>multiple</code>.</p>

    <x-t-select multiple name="select-multi1" class="mb-2" placeholder="Select one or more options..." :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
        4 => 'dddddd',
        5 => 'eeeeee',
        6 => 'ffffff',
    ]" />

    <p>Podem especificar el màxim d'opcions que es visualitzaran seleccionades, amb l'atribut <code>selectedLabelLimit</code>, afegint-se un text per indicar-ne la resta.
        El text es pot personalitzar amb l'atribut <code>selectedLabelLimitText</code>. </p>
   
    <div class="row mb-2">
        <div class="col">

    <x-t-select multiple name="select-multi2" selectedLabelLimit="2"  placeholder="selectedLabelLimit=2"
     :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
            4 => 'dddddd',
            5 => 'eeeeee',
            6 => 'ffffff',
        ]" />
        </div>
        <div class="col">
            <x-t-select multiple name="select-multi3" selectedLabelLimit="2" placeholder="custom selectedLabelLimitText" selectedLabelLimitText=":num més..." :data-options="[
                1 => 'aaaa aaa',
                2 => 'bbbb bbb',
                3 => 'cccc ccc',
                4 => 'dddddd',
                5 => 'eeeeee',
                6 => 'ffffff',
            ]" />
        </div>
   </div>


    <p>Per defecte les opcions selecionades es mostren com un text separat per comes, però podem definir el caràcter de separació amb <code>selectedLabelGlue</code>.</p>
    <x-t-select search="true" name="select-multi5" class="mb-2"  multiple selectedLabelGlue=" - " placeholder="selectedLabelGlue='-'" :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
        4 => 'dddd bbb',
        5 => 'eeeee bbb',
        6 => 'ffff ccc',
    ]" />
    <p>I també podem afegir codi abans i darrere de cada opció amb  <code>selectedLabelPrefix</code> i <code>selectedLabelSufix</code>. Per exemple per mostrar-ho com a etiquetes.</p>
        
    <x-t-select search="true" name="select-multi6" multiple 
        selectedLabelGlue=" "
        selectedLabelPrefix="<span class='badge text-bg-secondary'>" 
        selectedLabelSufix="</span>" 
        placeholder="selected shown as labels"
        :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
            4 => 'dddd bbb',
            5 => 'eeeee bbb',
            6 => 'ffff ccc',
        ]" />

    <button type="submit" class="btn btn-primary my-3">Test form</button>

</x-t-form>

<hr />

<h5>Enllaçat amb livewire</h5>
<p>Com en qualsevol control natiu, podem fer servir <code>wire:model</code> per lligar-ho amb Livewire.</p>

<div class="input-group ">
    <x-t-select width="100%" wire:model="dummy" placeholder="wire:model" :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
    ]" />
    <span class="input-group-text">Valor: {{ $dummy }}</span>
</div>



<hr />

<x-t-form action="{{ route('t-components.testForm') }}" method="post">

    <h5>Option groups</h5>
    <p>Cal que afegim l'atribut <code>grouped</code></p>
    <p>L'array de data ha de tenir un primer nivell en que la clau sigui el nom del grup (aquest not pot
        incloure codi HTML).</p>


    <x-t-select placeholder="Option group" name="gr1" grouped class="mb-1" :data-options="[
        'Trains' => [
            1 => ['value' => 'Train 1', 'icon' => 'train-front'],
            2 => ['value' => 'Train 2', 'icon' => 'train-front'],
        ],
        'Cars' => [
            3 => ['value' => 'Car 1', 'icon' => 'car-front'],
            4 => ['value' => 'Car 2', 'icon' => 'car-front'],
        ],
    ]" />


    <x-t-select placeholder="Option group multiple" name="gr2" multiple class="mb-1" grouped
        :data-options="[
            'Trains' => [
                1 => ['value' => 'Train 1', 'icon' => 'train-front'],
                2 => ['value' => 'Train 2', 'icon' => 'train-front'],
            ],
            'Cars' => [
                3 => ['value' => 'Car 1', 'icon' => 'car-front'],
                4 => ['value' => 'Car 2', 'icon' => 'car-front'],
            ],
        ]" />


    <x-t-select placeholder="Option group with search" name="gr3" search class="mb-1" grouped
        :data-options="[
            '<i class=\'bi bi-train-front\'></i> Trains' => [
                1 => ['value' => 'Train 1', 'icon' => 'train-front'],
                2 => ['value' => 'Train 2', 'icon' => 'train-front'],
                5 => ['value' => 'Truluri', 'icon' => 'train-front'],
            ],
            'Cars' => [
                3 => ['value' => 'Car 1', 'icon' => 'car-front'],
                4 => ['value' => 'Car 2', 'icon' => 'car-front'],
                6 => ['value' => 'Cartrain', 'icon' => 'car-front'],
            ],
        ]" />

    <x-t-select placeholder="Option group async" search name="gr4" class="mb-1" prefetch grouped
        :data-src="route('t-components.testAjax', ['grouped' => 1])" />

     <button type="submit" class="btn btn-primary my-3">Test form</button>

</x-t-form>


<hr />

<h5>Mides</h5>
<p>Disposem de les tres mides de bootstrap (sm, md i lg).</p>

<div class="row gx-1">
    <div class="col">


        <x-t-select name="select-sm" size="sm" placeholder="size=sm" allow-clear :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

    </div>
    <div class="col">


        <x-t-select name="select-sm" size="md" placeholder="size=md" allow-clear :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

    </div>
    <div class="col">


        <x-t-select name="select-sm" size="lg" placeholder="size=lg" allow-clear :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

    </div>
</div>



<hr />



<h5>A un inputgroup</h5>
<p>Els selects s'integren a un input-group Bootstrap de la mateixa manera que ha faria un select natiu.</p>
<div class="input-group ">

    <x-t-text icon="text-left" />
    <x-t-date icon="calendar" nativeMobile="false" placeholder="" />

    <x-t-select icon="book" selected="3" allow-clear :data-options="[
        1 => 'dfdf',
        2 => 'aaaa',
        3 => 'aaaadf',
    ]" />
    <x-t-select :data-options="[
        1 => 'dfdf',
        2 => 'aaaa',
        3 => 'aaaadf',
    ]" />

</div>



<hr />



<h5>Valors amb HTML</h5>
<p>El valor de les opcions por contindre codi HTML</p>
<x-t-select selected="2" placeholder="with HTML" :data-options="[
    1 => 'aaaa <em>aaa</em>',
    2 => 'bbbb <strong>bbb</strong>',
    3 => '<u>cccc</u> ccc',
]" />



<hr />


<h5>Valor per defecte</h5>
<p>Per definir un valor per defecte farem servir l'atribut <code>selected</code></p>
<x-t-select selected="2" class="mb-2" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />

<p>En cas de selects multiple haurem de passar un array (afegim el dos punts per poder fer servir php).</p>

<x-t-select multiple :selected="[1,2]" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />

<hr />


<h5>Botó per netejar</h5>
<p>Podem habilitar una creueta per netejar el valor amb l'atribut <code>allow-clear</code>, tant per selects simples com múltiples.</p>

<div class="row">
    <div class="col">
        <x-t-select allow-clear placeholder="allow-clear" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
    <div class="col">
        <x-t-select allow-clear placeholder="allow-clear" multiple :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
</div>





<hr />



<h5>Buscador integrat</h5>
<p>Amb l'atribut <code>search</code> habilitem un buscador.</p>
{{-- <p>Si a més afegim l'atribut <code>inlineSearch</code> el buscador estarà integrat en el botó desplegable.</p> --}}

<x-t-select search class="mb-2" placeholder="search" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />

<p>Podem personalitzar el text del placeholder del buscador amb l'atribut <code>sarch-placeholder</code>.</p>

<x-t-select search class="mb-2" placeholder="search-placeholder" search-placeholder="Introdueix la cerca..." :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />



{{-- <x-t-select search  inlineSearch class="mb-2" placeholder="inline search"  :data-options="[
        1=>'aaaa aaa',
        2=>'bbbb bbb',
        3=>'cccc ccc'
    ]"/> --}}






<hr />


<h5>Amplada</h5>
<p>Per defecte l'amplada s'ajusta a la del contenidor, com els selects natius. Per exemple aquí tenim un contenidor de 100px d'ample:</p>
<div style="width:100px;outline:2px solid cyan;" class="mb-2">
    <x-t-select class='mierda' multiple sarch-placeholder="Busca..."
        allow-clear :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

</div>

<p>Podem definir una amplada concreta amb l'atribut <code>width</code>.</p>
<x-t-select class='mierda' width="200px" placeholder="width=200px" class="mb-2" allow-clear
    :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
    ]" />


<p>O bé podem fer que el select s'ajusti en amplada al contingut posant l'atribut <code>width="fit-content"</code>:</p>
<x-t-select width="fit-content" placeholder="width='fit-content'" sarch-placeholder="Busca..."
    allow-clear :data-options="[
        1 => 'aa',
        2 => 'bbbb bbbbb',
        3 => 'cccc',
        3 => 'Ex cupidatat et dolor cillum dolore laborum tempor consectetur. Dolore consectetur consectetur exercitation minim deserunt enim amet velit eu sunt mollit.',
    ]" />



<hr />



<h5>Alçada</h5>
<p>podem definir una alçada màxima amb l'atribut <code>height</code>.</p>
<x-t-select placeholder="A lot of options (height 120px)" allow-clear height="120px" class="mb-2"
    :data-options="[
        1 => 'aaaa aaa',
        2 => 'bbbb bbb',
        3 => 'cccc ccc',
        4 => 'cccc ccc',
        5 => 'cccc ccc',
        6 => 'cccc ccc',
        7 => 'cccc ccc',
        8 => 'cccc ccc',
        9 => 'cccc ccc',
        10 => 'cccc ccc',
        11 => 'cccc ccc',
        12 => 'cccc ccc',
        13 => 'cccc ccc',
        14 => 'cccc ccc',
        15 => 'cccc ccc',
        16 => 'cccc ccc',
        17 => 'cccc ccc',
        18 => 'cccc ccc',
        19 => 'cccc ccc',
        20 => 'cccc ccc',
    ]" />

<x-t-select placeholder="A lot of options (height 200px)" allow-clear height="200px" search :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
    4 => 'cccc ccc',
    5 => 'cccc ccc',
    6 => 'cccc ccc',
    7 => 'cccc ccc',
    8 => 'cccc ccc',
    9 => 'cccc ccc',
    10 => 'cccc ccc',
    11 => 'cccc ccc',
    12 => 'cccc ccc',
    13 => 'cccc ccc',
    14 => 'cccc ccc',
    15 => 'cccc ccc',
    16 => 'cccc ccc',
    17 => 'cccc ccc',
    18 => 'cccc ccc',
    19 => 'cccc ccc',
    20 => 'cccc ccc',
]" />



<hr />




<x-t-form action="{{ route('t-components.testForm') }}" method="post">
    @csrf
    <h5>Asíncron</h5>
    <p>Podem fer que les dades del select s'obtinguin de forma asíncrona.</p>
    <p>S'ha de definir la URL de la que s'obtindran les dades amb l'atribut <code>data-src</code></p>
    <p>Per defecte s'envia per GET. Es pot modificar amb <code>data-src-method</code></p>
    <p>El número de resultats mostrats ve determinat per l'atribut <code>limit</code>. Aquest s'envia com a
        paràmetre a la URL, que l'hauria de tenir en compte per limitar els resultats també a servidor. Podem modificar
        el nom del paràmetre amb <code>limitName="newname"</code></p>
   
    <x-t-select placeholder="Async data" name="async1" :data-src="route('t-components.testAjax')" class="mb-2" />
    
    <p>Si habilitem l'atribut <code>lazy-load</code> també s'envia al servidor el paràmetre <code>page</code>. 
        Aquest s'hauria de tenir en compte per retornar la pàgina de resultats que toqui. Podem modificar
        el nom del paràmetre amb <code>pageName="newname"</code></p>
        
    <x-t-select placeholder="Async lazyload " lazy-load  prefetch name="async-lazy" selected="122" search limit="10" :data-src="route('t-components.testAjax')" class="mb-2" />

    <p>Les dades s'obtenen quan es desplega el select per primera vegada. Podem afegir l'atribut
        <code>prefetch</code> per que s'otinguin a la càrrega inicial. </p>
    <x-t-select placeholder="Async data prefetch" name="async2" :data-src="route('t-components.testAjaxPost')" data-src-method="post"
        class="mb-2" prefetch />

    <p>Podem habilitar el buscador. Se li enviarà el paràmetre <code>term</code> a la url definida . Podem modificar
        el nom del paràmetre amb <code>termName="newname"</code>.</p>
    <x-t-select placeholder="Async data prefetch search limit=5" name="async3" search-placeholder="Type Tr..."
        :data-src="route('t-components.testAjax')" search prefetch limit="5" class="mb-2" />
    <x-t-select placeholder="Async data prefetch search multiple limit=5" name="async4" data-src-method="post"
        multiple search-placeholder="Type Tr..." :data-src="route('t-components.testAjax')" search prefetch limit="5"
        class="mb-2" />


    <p>Podem definir valor preseleccionats amb l'atribut <code>selected</code> (cal activar el <code>prefetch</code>). En aquest cas, es passa el paràmetre
        <code>selected</code> a la URL. Des del servidor s'haurem d'encarregar de retornar també les opcions seleccionades, pq es
        puguin visualitzar.</p>
    <x-t-select placeholder="Async data with selected" name="async5" search-placeholder="Type Tr..."
        selected="55" :data-src="route('t-components.testAjax')" search prefetch limit="5" class="mb-2" />
    <x-t-select placeholder="Async data with selected" name="async6" data-src-method="post" :selected="[1, 10, 22]"
        multiple search-placeholder="Type Tr..." :data-src="route('t-components.testAjax')" search prefetch limit="5"
        class="mb-2" />

    <button type="submit" class="btn btn-primary my-3">Test form</button>

</x-t-form>




<hr />



<h5>Estils</h5>
    
<p>podem canviar l'estil amb l'atribut <code>color</code>. Fent servir els colors de bootstrap: primary, secondary, info, success...</p>
<div class="row mb-3 g-1">
    <div class="col-sm-3">
        <x-t-select color="primary" allow-clear placeholder="Estil primary" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

    </div>
    <div class="col-sm-3 ">
        <x-t-select color="secondary" allow-clear placeholder="Estil secondary" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

    </div>
    <div class="col-sm-3">
        <x-t-select color="info" allow-clear placeholder="Estil Info" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
    <div class="col-sm-3">
        <x-t-select color="success" allow-clear placeholder="Estil Success" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />

    </div>
    <div class="col-sm-3">
        <x-t-select color="warning" allow-clear placeholder="Estil warning" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
    <div class="col-sm-3">
        <x-t-select color="danger" allow-clear placeholder="Estil danger" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
    <div class="col-sm-3">
        <x-t-select color="light" allow-clear placeholder="Estil light" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
    <div class="col-sm-3">
        <x-t-select color="dark" allow-clear placeholder="Estil dark" :data-options="[
            1 => 'aaaa aaa',
            2 => 'bbbb bbb',
            3 => 'cccc ccc',
        ]" />
    </div>
</div>




<p>També podem definir un color diferent per cada opció. En aquest cas hem de passar l'atribut <code>color</code> a cada opció de l'array de dades.</p>
<p>Això definirà el color tant de la opció com del propi select per la opció seleccionada.</p>
<div class="row mb-2">
    <div class="col">
        <x-t-select allow-clear placeholder="Tria Estil" :data-options="[
            1 => ['value' => 'success', 'color' => 'success'],
            2 => ['value' => 'danger', 'color' => 'danger'],
            3 => ['value' => 'info', 'color' => 'info'],
            4 => 'other',
        ]" />
    </div>
    <div class="col">

        <x-t-select multiple allow-clear placeholder="Tria Estils" selectedLabelGlue=" "
            :data-options="[
                1 => ['value' => 'success', 'color' => 'success'],
                2 => ['value' => 'danger', 'color' => 'danger'],
                3 => ['value' => 'info', 'color' => 'info'],
                4 => 'other',
            ]" />
    </div>
</div>

<p>Adicionalment, podem definir classes css específiques per cada opció. En aquest cas hem de passar l'atribut <code>class</code>.</p>
<x-t-select width="fit-content" icon="ticket" placeholder="Amb CSS per opció" :data-options="[
    1 => ['value' => 'Opció 1'],
    2 => ['value' => 'Opció 1'],
    3 => ['value' => 'Altres opcions', 'icon'=>'three-dots', 'class'=>'text-muted border-top pt-3 pb-1'],
]" />



<hr />




<h5>Icones</h5>
<p>Podem definir icones tant pel select com per cadascuna de les opcions.</p>
<p>S'ha de posar el nom de la icona del paquet <a href="https://icons.getbootstrap.com/" target="_blank">bootstrap icons</a></p>

<x-t-select width="fit-content" icon="ticket" placeholder="Choose transport" :data-options="[
    1 => ['value' => 'Airplane', 'icon' => 'airplane'],
    2 => ['value' => 'Car', 'icon' => 'car-front'],
    3 => ['value' => 'Train', 'icon' => 'train-front'],
]" />

<hr class="mb-5"/>

<h5>Overlay</h5>
<p>Podem mostrar un overlay quan es desplega el select afegint l'atribut <code>overlay</code>.</p>
<p>Podem definir el color de l'overlay amb <code>overlay-color</code>.</p>

<x-t-select overlay  placeholder="Amb overlay" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />


<x-t-select overlay overlay-color="primary" placeholder="Amb overlay primary" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />

<x-t-select overlay overlay-color="info" placeholder="Amb overlay info" :data-options="[
    1 => 'aaaa aaa',
    2 => 'bbbb bbb',
    3 => 'cccc ccc',
]" />


<hr class="mb-5"/>


<h5>Descripció a les opcions</h5>
<p>Podem afegir una descripció a cada opció amb l'atribut  <code>description</code>.</p>

<x-t-select  placeholder="Amb descripcions" :data-options="[
    1 => ['value' => 'Opció 1', 'description' => 'Nisi in deserunt excepteur ad eiusmod.'],
    2 => ['value' => 'Opció 2', 'description' => 'Id labore deserunt adipisicing dolore veniam.'],
    3 => ['value' => 'Opció 3', 'description' => 'Ea nostrud culpa sint magna cillum laboris commodo.'],
]" />

