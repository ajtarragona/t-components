<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Selects</h1>
        <p class="lead">
            Camps de selecció. 
        </p>
        <p class="lead">Fem servir l'etiqueta <code>&lt;x-t-select/&gt;</code></p>
        <p class="lead">No fem servir cap paquet extern. Simplement es fan servir les Dropdown de bootstrap per emular la funcionalitat dels Select.</p>

    </div>
    <div>
       
    </div>
</div>
<hr/>

<form action="{{route('t-components.testForm')}}" method="post">
    @csrf

    <div class="row ">
        
        <div class="col">
        
            <h5>Select natiu</h5>

            <x-t-select native name="select-natiu" class="" selected="2" :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc'
            ]"/>
        
        </div>
        <div class="col">
                @csrf
                <h5>Select simple</h5>

                <x-t-select name="select1" :data="[
                    1=>'aaaa aaa',
                    2=>'bbbb bbb',
                    3=>'cccc ccc'
                ]"/>
        
        </div>
        <div class="col">  
            <h5>Select multiple</h5>

            <x-t-select multiple name="select2"  selectedLabelLimit="2" :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc',
                4=>'dddddd',
                5=>'eeeeee',
                6=>'ffffff'
            ]"/>
        </div>
        <div class="col">  
            <h5>Select disabled</h5>

            <x-t-select multiple name="select3"  disabled selectedLabelLimit="2" :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc',
                4=>'dddddd',
                5=>'eeeeee',
                6=>'ffffff'
            ]"/>
        </div>
        <div class="col">  
            <h5>Select readonly</h5>

            <x-t-select multiple name="select4" :selected="[1,2,5]" readonly selectedLabelLimit="2" :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc',
                4=>'dddddd',
                5=>'eeeeee',
                6=>'ffffff'
            ]"/>
        </div>

        
    </div>
    <button type="submit" class="btn btn-primary my-3">Test form</button>
    @if(session('formRequest'))
        <div class="mt-2">@dump(session('formRequest'))</div>
    @endif
</form>

<hr/>
    


<div class="row gy-3">
    <div class="col-12">
        <h5>Enllaçat amb livewire</h5>

        <div class="input-group ">
            <x-t-select width="100%" wire:model="dummy" :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc'
            ]"/>
            <span class="input-group-text" >Valor: {{ $dummy}}</span>
        </div>

    </div>


    <hr/>

    <form action="{{route('t-components.testForm')}}" method="post">
        @csrf
        <div class="col-12 ">
            <h5>Option groups</h5>
            <p>Cal que afegim l'atribut <code>grouped</code></p>
            <p>L'array de data ha de tenir un primer nivell en que la clau sigui el nom del grup (aquest not pot incloure codi HTML).</p>


            <x-t-select placeholder="Option group" name="gr1" grouped class="mb-1" :data="[
                'Trains'=>[
                    1=>['value'=>'Train 1','icon'=>'train-front'],
                    2=>['value'=>'Train 2','icon'=>'train-front'],
                ],
                'Cars'=>[
                    3=>['value'=>'Car 1','icon'=>'car-front'],
                    4=>['value'=>'Car 2','icon'=>'car-front'],
                ]
            ]"/>

            
            <x-t-select placeholder="Option group multiple" name="gr2"  multiple class="mb-1"  grouped :data="[
                'Trains'=>[
                    1=>['value'=>'Train 1','icon'=>'train-front'],
                    2=>['value'=>'Train 2','icon'=>'train-front'],
                ],
                'Cars'=>[
                    3=>['value'=>'Car 1','icon'=>'car-front'],
                    4=>['value'=>'Car 2','icon'=>'car-front'],
                ]
            ]"/>

            
            <x-t-select placeholder="Option group with search" name="gr3" search class="mb-1"  grouped :data="[
                '<i class=\'bi bi-train-front\'></i> Trains'=>[
                    1=>['value'=>'Train 1','icon'=>'train-front'],
                    2=>['value'=>'Train 2','icon'=>'train-front'],
                    5=>['value'=>'Truluri','icon'=>'train-front'],
                ],
                'Cars'=>[
                    3=>['value'=>'Car 1','icon'=>'car-front'],
                    4=>['value'=>'Car 2','icon'=>'car-front'],
                    6=>['value'=>'Cartrain','icon'=>'car-front'],
                ]
            ]"/>

            <x-t-select placeholder="Option group async" search name="gr4" class="mb-1" prefetch grouped :data-src="route('t-components.testAjax',['grouped'=>1])"/>
        </div>
        <button type="submit" class="btn btn-primary my-3">Test form</button>
        @if(session('formRequest'))
            <div class="mt-2">@dump(session('formRequest'))</div>
        @endif
    </form>
</div>

<hr/>

<h5>Mides</h5>
<div class="row gy-3">
    <div class="col">
        

        <x-t-select name="select-sm" size="sm" placeholder="size=sm" allowClear :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc'
        ]"/>

    </div>
    <div class="col">
        

        <x-t-select name="select-sm" size="md" placeholder="size=md"  allowClear :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc'
        ]"/>

    </div>
    <div class="col">
        

        <x-t-select name="select-sm" size="lg" placeholder="size=lg"  allowClear :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc'
        ]"/>

    </div>
</div>

<hr/>

<div class="row gy-3">

   <div class="col-12">
       <h5>A un inputgroup</h5>
       <div class="input-group ">
           
           <x-t-text icon="text-left"  />
           <x-t-date icon="calendar "  placeholder=""/>

           <x-t-select icon="book"  selected="3" allowClear="true" :data="[
                   1=>'dfdf',
                   2=>'aaaa',
                   3=>'aaaadf'
           ]"
           /> 
           <x-t-select  :data="[
                   1=>'dfdf',
                   2=>'aaaa',
                   3=>'aaaadf'
           ]"
           /> 

       </div>
   </div>
   <hr/>
   <div class="col-12">
        <h5>Valors amb HTML</h5>
        <x-t-select selected="2" :data="[
            1=>'aaaa <em>aaa</em>',
            2=>'bbbb <strong>bbb</strong>',
            3=>'<u>cccc</u> ccc'
        ]"/>

    </div>
    <hr/>
    <div class="col-12">
        <h5>Valor per defecte</h5>
        <x-t-select selected="2" :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc'
        ]"/>

    </div>
    <hr/>
    <div class="col-12">
        <h5>Botó per netejar</h5>
        <div class="row">
            <div class="col">
                <x-t-select allowClear="true" :data="[
                    1=>'aaaa aaa',
                    2=>'bbbb bbb',
                    3=>'cccc ccc'
                ]"/>
            </div>
            <div class="col">
                <x-t-select allowClear="true" multiple :data="[
                    1=>'aaaa aaa',
                    2=>'bbbb bbb',
                    3=>'cccc ccc'
                ]"/>
            </div>
        </div>
        

    </div>

    <hr/>

    <div class="col-12">
        <h5>Buscador integrat</h5>
        <p>Amb l'atribut <code>search</code> habilitem un buscador.</p>
        {{-- <p>Si a més afegim l'atribut <code>inlineSearch</code> el buscador estarà integrat en el botó desplegable.</p> --}}
        
        <x-t-select search class="mb-2" :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc'
        ]"/>

        {{-- <x-t-select search  inlineSearch class="mb-2" :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc'
        ]"/> --}}
       
       


    </div>
    <hr/>
    <div class="col-12">
        <h5>Múltiple com a etiquetes</h5>
        <x-t-select search="true" multiple allowClear selectedLabelLimit="4" selectedLabelGlue=" " selectedLabelPrefix="<span class='badge text-bg-secondary'>" selectedLabelSufix="</span>"  :data="[
            1=>'aaaa aaa',
            2=>'bbbb bbb',
            3=>'cccc ccc',
            4=>'dddd bbb',
            5=>'eeeee bbb',
            6=>'ffff ccc'
        ]"/>
    </div>


    <hr/>
    
        <div class="col-12">
            <h5>Amplada</h5>
            Per defecte l'amplada s'ajusta a la del contenidor. Per exemple aquí tenim un contenidor de 100px d'ample:
            <div style="width:100px;outline:2px solid cyan;">
                <x-t-select  class='mierda' multiple mierda="dsds" placeholder="Tria opció" sarch-placeholder="Busca..." allow-clear="true" :data="[
                    1=>'aaaa aaa',
                    2=>'bbbb bbb',
                    3=>'cccc ccc'
                ]"/>
    
            </div>
    
            Podem definir una amplada concreta amb l'atribut <code>width</code>
            <x-t-select  class='mierda' width="100px" placeholder="Tria opció"  sarch-placeholder="Busca..." allow-clear="true" :data="[
                 1=>'aaaa aaa',
                 2=>'bbbb bbb',
                 3=>'cccc ccc'
             ]"/>
    
    
            O bé podem fer que el select s'ajusti en amplada al contingut posant l'atribut <code>width="fit-content"</code>:
            <x-t-select   width="fit-content" label="Lalalal1" placeholder="Tria opció" sarch-placeholder="Busca..." allow-clear="true" :data="[
                1=>'aa',
                2=>'bbbb bbbbb',
                3=>'cccc'
                ]"/>
    
         </div>
    
         <hr/>
    
         <div class="col-12">
            <h5>Alçada</h5>
            <p>podem definir una alçada màxima amb l'atribut <code>height</code>.</p>
            <x-t-select placeholder="A lot of options" allow-clear="true" height="200px" class="mb-2" :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc',
                4=>'cccc ccc',
                5=>'cccc ccc',
                6=>'cccc ccc',
                7=>'cccc ccc',
                8=>'cccc ccc',
                9=>'cccc ccc',
                10=>'cccc ccc',
                11=>'cccc ccc',
                12=>'cccc ccc',
                13=>'cccc ccc',
                14=>'cccc ccc',
                15=>'cccc ccc',
                16=>'cccc ccc',
                17=>'cccc ccc',
                18=>'cccc ccc',
                19=>'cccc ccc',
                20=>'cccc ccc'
            ]"/>
    
            <x-t-select placeholder="A lot of options" allow-clear="true" height="200px" search :data="[
                1=>'aaaa aaa',
                2=>'bbbb bbb',
                3=>'cccc ccc',
                4=>'cccc ccc',
                5=>'cccc ccc',
                6=>'cccc ccc',
                7=>'cccc ccc',
                8=>'cccc ccc',
                9=>'cccc ccc',
                10=>'cccc ccc',
                11=>'cccc ccc',
                12=>'cccc ccc',
                13=>'cccc ccc',
                14=>'cccc ccc',
                15=>'cccc ccc',
                16=>'cccc ccc',
                17=>'cccc ccc',
                18=>'cccc ccc',
                19=>'cccc ccc',
                20=>'cccc ccc'
            ]"/>
    
         </div>
    
        <hr/>
      <div class="col-12 mb-5">
        <form action="{{route('t-components.testForm')}}" method="post">
            @csrf
            <h5>Asíncron</h5>
            <p>podem fer que les dades del select s'obtinguin de forma asíncrona.</p>
            <p>S'ha de definir la URL de la que s'obtindran les dades amb l'atribut <code>data-src</code></p>
            <p>Per defecte s'envia per GET. Es pot modificar amb  <code>data-src-method</code></p>
            <p>El número de resultats mostrats ve determinat per l'atribut <code>limit</code>. Aquest s'envia com a paràmetre a la URL, que l'hauria de tenir en compte per limitar els resultats també a servidor.</p>
            
            <x-t-select placeholder="Async data" name="async1" :data-src="route('t-components.testAjax')" class="mb-2"/>
    
            <p>Les dades s'obtenen quan es desplega el select per primera vegada. Podem afegir l'atribut <code>prefetch</code> per que s'otinguin a la càrrega inicial. </p>
            <x-t-select placeholder="Async data prefetch" name="async2"  :data-src="route('t-components.testAjaxPost')" data-src-method="post" class="mb-2"  prefetch/>
            
            <p>Podem habilitar el buscador. Se li enviarà el paràmetre <code>term</code> a la url definida . Podem modificar el nom del paràmetre amb <code>termName="newname"</code>.</p>
            <x-t-select placeholder="Async data prefetch search limit=5" name="async3"  search-placeholder="Type Tr..." :data-src="route('t-components.testAjax')" search prefetch limit="5" class="mb-2"  />
            <x-t-select placeholder="Async data prefetch search multiple limit=5" name="async4" data-src-method="post"  multiple search-placeholder="Type Tr..." :data-src="route('t-components.testAjax')" search prefetch limit="5" class="mb-2"  />


            <p>Podem definir valor preseleccionats amb l'atribut <code>selected</code>. En aquest cas, es passa el paràmetre selected a la URL. Des del servidor s'haurem d'encarregar de retornar també les opcions seleccionades, pq es puguin visualitzar.</p>
            <x-t-select placeholder="Async data with selected" name="async5"  search-placeholder="Type Tr..." selected="55" :data-src="route('t-components.testAjax')" search prefetch limit="5" class="mb-2"  />
            <x-t-select placeholder="Async data with selected" name="async6" data-src-method="post"  :selected="[1,10,22]" multiple search-placeholder="Type Tr..." :data-src="route('t-components.testAjax')" search prefetch limit="5" class="mb-2"  />

            <button type="submit" class="btn btn-primary my-3">Test form</button>
            @if(session('formRequest'))
                <div class="mt-2">@dump(session('formRequest'))</div>
            @endif
            </form>
        </div>
    
         <hr/>
        <div class="col-12">
    
            <h5>Estils</h5>
            podem canviar l'estil amb l'atribut <code>color</code>. Fent servir els colors de bootstrap: primary, secondary, info, success...
            <div class="row mt-3 gx-1">
                <div class="col ">
                    <x-t-select  color="primary" allow-clear="true" placeholder="Estil primary" :data="[
                        1=>'aaaa aaa',
                        2=>'bbbb bbb',
                        3=>'cccc ccc'
                    ]"/>
    
                </div>
                <div class="col">
                    <x-t-select  color="success" allow-clear="true" placeholder="Estil Success" :data="[
                        1=>'aaaa aaa',
                        2=>'bbbb bbb',
                        3=>'cccc ccc'
                    ]"/>
    
                </div>
                <div class="col">
                    <x-t-select  color="info" allow-clear="true" placeholder="Estil Info"  :data="[
                        1=>'aaaa aaa',
                        2=>'bbbb bbb',
                        3=>'cccc ccc'
                    ]"/>
                </div>
                <div class="col">
                    <x-t-select  color="warning" allow-clear="true" placeholder="Estil warning"  :data="[
                        1=>'aaaa aaa',
                        2=>'bbbb bbb',
                        3=>'cccc ccc'
                    ]"/>
                </div>
            </div>
            
    
        </div>
        <div class="col-12">
            <p>També podem definir un estil diferent per cada opció. En aquest cas al valor de la opció hem de pasar un array amb l'atribut color.</p>
            <p>Això definirà el color tant de la opció com del propi select per la opció seleccionada.</p>
            <div class="row">
                <div class="col">
                    <x-t-select  allow-clear="true" placeholder="Tria Estil"  :data="[
                        1=>['value'=>'success','color'=>'success'],
                        2=>['value'=>'danger','color'=>'danger'],
                        3=>'other'
                    ]"/>
                </div>
                <div class="col">
    
                    <x-t-select  multiple allow-clear="true" placeholder="Tria Estils" selectedLabelGlue=" "  :data="[
                        1=>['value'=>'success','color'=>'success'],
                        2=>['value'=>'danger','color'=>'danger'],
                        3=>'other'
                    ]"/>
                </div>
            </div>
            
            
        </div>
    
        <hr/>
        <div class="col-12 mb-5">
    
            <h5>Icones</h5>
            <p>podem definir icones tant pel select com per cadascuna deles opcions.</p>
            <p>S'ha de posar el nom de la icona del paquet <a href="https://icons.getbootstrap.com/" target="_blank">bootstrap icons</a></p>
            <x-t-select  width="fit-content" icon="ticket" placeholder="Choose transport" :data="[
                    1 =>['value'=>'Airplane','icon'=>'airplane'],
                    2 =>['value'=>'Car','icon'=>'car-front'],
                    3 =>['value'=>'Train','icon'=>'train-front'],
            ]"/>
        </div>
</div>