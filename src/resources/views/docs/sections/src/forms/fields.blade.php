<x-t-form action="{{ route('t-components.testForm') }}" method="post">


<div class="row g-2">
    <div class="col-4">
        <x-t-field label="Camp de text" for="text-field-1" class="mb-2">
            <x-t-text name="text-field-1" />
        </x-t-field>
        
    </div>
    <div class="col-4">
        <x-t-field label="Camp select" for="select-field-14" class="mb-2">
            <x-t-select 
                name="select-field-14"
                :data="[
                    1=>'aaa',
                    2=>'bbb',
                    3=>'cccccc'
                ]"
        
            />
        </x-t-field>
    </div>
    <div class="col-4">
        <x-t-field label="Camp data" for="text-field-15" class="mb-2">
            <x-t-date name="text-field-15" icon="calendar"/>
        </x-t-field>
    </div>

    <div class="col-4">
        <x-t-field label="Camp check"  class="mb-2">
            <x-t-checkbox  name="ch1-check1[]" value="1" >Opció 1</x-t-checkbox>
            <x-t-checkbox  name="ch1-check1[]" value="2" >Opció 2</x-t-checkbox>
            <x-t-checkbox  name="ch1-check1[]" value="3" >Opció 3</x-t-checkbox>

        </x-t-field>
    </div>
</div>
 <button type="submit" class="btn btn-primary my-3">Test form</button>

</x-t-form>

<hr/>

<h5>Label Placement</h5>
<p>Es pot colocar l'etiqueta a les quatre posicions adjancents al camp (top, bottom, start (esquerra) i  end (dreta)).<br>
En mòbil les etiquetes laterals es colocaran verticalment.</p>
<div class="row">
    <div class="col-12">
        <x-t-field label="Top (default)" for="text-field-7"  label-placement="top" class="mb-2">
            <x-t-text id="text-field-7"  placeholder="label-placement='top'"/>
        </x-t-field>
    </div>
    <div class="col-12">
        <x-t-field label="Bottom" for="text-field-8"  label-placement="bottom" class="mb-2">
            <x-t-text id="text-field-8" placeholder="label-placement='bottom'"/>
        </x-t-field>
    </div>
    <div class="col-12">
        <x-t-field label="Start" for="text-field-9"  label-placement="start" label-align="start" class="mb-2">
            <x-t-text id="text-field-9"  placeholder="label-placement='start'"/>
        </x-t-field>
        
    </div>
    <div class="col-12">
        <x-t-field label="End" for="text-field-2" label-placement="end"  class="mb-2">
            <x-t-text id="text-field-2" placeholder="label-placement='end'"/>
        </x-t-field>
    </div>
   
    
   
</div>

<hr/>


<h5>Label alignment</h5>

<div class="row">
    <div class="col-12">
        <x-t-field label="Top align end" for="text-field-7-2"  label-placement="top" label-align="end" class="mb-2">
            <x-t-text id="text-field-7-2"  placeholder="label-placement='top' label-align='end' "/>
        </x-t-field>
    </div>
    <div class="col-12">
        <x-t-field label="Bottom align end" for="text-field-8-2"  label-placement="bottom" label-align="end"  class="mb-2">
            <x-t-text id="text-field-8-2" placeholder="label-placement='bottom' label-align='end'"/>
        </x-t-field>
    </div>
    <div class="col-12">
        <x-t-field label="Start align end" for="text-field-10-2"  label-placement="start" label-align="end" class="mb-2">
            <x-t-text id="text-field-10-2"  placeholder="label-placement='start' label-align='end'" />
        </x-t-field>
    </div>
    <div class="col-12">
        <x-t-field label="End align end" for="text-field-2-2" label-align="end" label-placement="end" class="mb-2">
            <x-t-text id="text-field-2-2" placeholder="label-placement='end' label-align='end'"/>
        </x-t-field>
    </div>
   
</div>



<hr/>

<h5>Camps obligatoris</h5>
<form action="{{route('t-components.testForm')}}" method="post">
    @csrf
    <p class="mb-1">Afegint l'atribut <code>required</code> es mostrarà un asteric a l'etiqueta del camp.</p>
    <p>Ull! Si realment volem que l'input es validi com a obligatori cal passar l'atribut també a aquest.</p>
    <x-t-field label="Obligatori" for="text-field-req-1"  required  class="mb-2">
        <x-t-text id="text-field-req-1" name="text-field-req-1" placeholder="Obligatori només label" />
    </x-t-field>

    <x-t-field label="Obligatori" for="text-field-req-2" required  class="mb-2">
        <x-t-text id="text-field-req-2" name="text-field-req-2" required placeholder="Obligatori també el camp" />
    </x-t-field>

    <button type="submit" class="btn btn-primary my-3">Test form</button>
   
</form>
<hr/>

<h5>Label Icons</h5>
<p>Pots especificar una icona per la label del camp. És diferent a la icona del propi input field.</p>
<x-t-field label="Top (default)" for="text-field-13" icon="person" label-placement="top" class="mb-2">
    <x-t-text id="text-field-13"  icon="book" placeholder="icon='person'"/>
</x-t-field>

<x-t-field for="text-field-13-1" icon="person" label-placement="start" label-width="fit-content" class="mb-2">
    <x-t-text id="text-field-13-1"  placeholder="icon='person' no label"/>
</x-t-field>



<hr/>

<h5>Form help text</h5>
<p>Pots especificar un text adjacent al camp. Permet HTML</p>
<x-t-field label="With Form text" for="text-field-16"  form-text="Adipisicing tempor ea dolore fugiat culpa voluptate qui labore." class="mb-2">
    <x-t-text id="text-field-16"  placeholder="form-text='...'" />
</x-t-field>



<x-t-field label="With Form text" for="text-field-18"  label-placement="start" form-text="Adipisicing tempor ea dolore fugiat culpa voluptate qui labore." class="mb-2">
    <x-t-text id="text-field-18"  placeholder="form-text='...'" />
</x-t-field>



<x-t-field label="With HTML form text" for="text-field-18"  label-placement="start" form-text="<span class='text-info'><i class='bi bi-exclamation-triangle'></i> Et proident elit officia laborum ipsum qui esse do occaecat ea nulla et mollit.</span>" class="mb-2">
    <x-t-text id="text-field-18"  placeholder="form-text='...'" />
</x-t-field>

<hr/>

<h5>Label Width</h5>
<p class="mb-1">Si no s'especifica, per defecte l'amplada de la label (per quan està a la dreta o esquerra, és de 20%).</p>
<p class="mb-1">Podem especificar una amplada concreta, en px, % o el que vulguem .</p>

<p class="mb-1">O bé si posem el valor "fit-content", s'ajustarà al text de la label.</p>
<p >En mòbil s'ignorarà aquesta amplada perquè l'etiqueta es colocarà verticalment.</p>

<x-t-field label="Amplada per defecte  {{$dummy}}" for="text-field-28" label-placement="start" class="mb-2">
    <x-t-text id="text-field-28" placeholder="Type something..." wire:model="dummy"/>
</x-t-field>
<x-t-field label="Amplada 300px  {{$dummy}}" for="text-field-11" label-placement="start" label-width="300px" class="mb-2">
    <x-t-text id="text-field-11" placeholder="label-width='300px'. Type something..." wire:model="dummy"/>
</x-t-field>
<x-t-field label="Amplada automàtica {{$dummy}}" for="text-field-12" label-placement="start" label-width="fit-content" class="mb-2">
    <x-t-text id="text-field-13" placeholder="label-width='fit-content'. Type something..." wire:model="dummy"/>
</x-t-field>

<hr/>
<h5>Boxed</h5>
<p>Amb l'atribut <code>boxed</code> s'inclourà la label dins de la caixa del camp.</p>
<x-t-field label="Boxed text" for="text-field-3" label-placement="top" boxed class="mb-2">
    <x-t-text id="text-field-3" placeholder="boxed text"/>
</x-t-field>

<x-t-field label="Boxed text align start" for="text-field-4" label-placement="start" icon="text-left" boxed class="mb-2">
    <x-t-text id="text-field-4" placeholder="boxed text align start" />
</x-t-field>

<x-t-field label="Boxed date " for="text-field-4-1" label-placement="start" icon="calendar" boxed class="mb-2">
    <x-t-date id="text-field-4-1" placeholder="boxed date " />
</x-t-field>


<x-t-field label="Boxed textarea" for="text-field-5" label-placement="top" boxed class="mb-2">
    <x-t-textarea id="text-field-5" placeholder="Boxed textarea"></x-t-textarea>
</x-t-field>


<x-t-field label="Boxed select" for="text-field-21" label-placement="top" boxed class="mb-2">
    <x-t-select 
        id="text-field-21" 
        placeholder="Boxed select"
        :data="[
            1=>'aaa',
            2=>'bbb',
            3=>'cccccc'
        ]"

    />
</x-t-field>

<x-t-field label="Boxed checks"  class="mb-2" boxed>
    <div class="py-2">
        <x-t-checkbox  name="boxed-ch1-check1[]" value="1" >Opció 1</x-t-checkbox>
        <x-t-checkbox  name="boxed-ch1-check1[]" value="2" >Opció 2</x-t-checkbox>
        <x-t-checkbox  name="boxed-ch1-check1[]" value="3" >Opció 3</x-t-checkbox>
    </div>

</x-t-field>

<x-t-field label="Boxed with Form text" for="text-field-21-2" boxed  form-text="Adipisicing tempor ea dolore fugiat culpa voluptate qui labore." class="mb-2">
    <x-t-text id="text-field-21-2"  placeholder="Boxed with form-text" />
</x-t-field>

<x-t-field label="Boxed with Form text" for="text-field-21-3" boxed  label-placement="start" form-text="Adipisicing tempor ea dolore fugiat culpa voluptate qui labore." class="mb-2">
    <x-t-text id="text-field-21-3"  placeholder="Boxed with form-text" />
</x-t-field>



<hr/>

<div class="card">
    <div class="card-body">
        <h5>Underlined</h5>
        <p>Amb l'atribut <code>underlined</code> utilitzarem un estil més net, amb una línia per sota.</p>
        <x-t-field label="Underlined text" for="text-field-u-3" label-placement="top" underlined class="mb-2">
            <x-t-text id="text-field-u-3" placeholder="underlined text"/>
        </x-t-field>

        <x-t-field label="Underlined text align start" for="text-field-u-4" label-placement="start" icon="text-left" underlined class="mb-2">
            <x-t-text id="text-field-u-4" placeholder="underlined text align start" />
        </x-t-field>

        <x-t-field label="Underlined date " for="text-field-4-u-1" label-placement="start" icon="calendar" underlined class="mb-2">
            <x-t-date id="text-field-4-u-1" placeholder="underlined date " />
        </x-t-field>


        <x-t-field label="Underlined textarea" for="text-field-u-5" label-placement="top" underlined class="mb-2">
            <x-t-textarea id="text-field-u-5" placeholder="underlined textarea"></x-t-textarea>
        </x-t-field>


        <x-t-field label="Underlined select" for="text-field-u-21" label-placement="top" underlined class="mb-2">
            <x-t-select 
                id="text-field-u-21" 
                placeholder="underlined select"
                :data="[
                    1=>'aaa',
                    2=>'bbb',
                    3=>'cccccc'
                ]"

            />
        </x-t-field>

        <x-t-field label="Boxed checks"  class="mb-2" underlined>
            <div class="py-2">
                <x-t-checkbox  name="underlined-ch1-check1[]" value="1" >Opció 1</x-t-checkbox>
                <x-t-checkbox  name="underlined-ch1-check1[]" value="2" >Opció 2</x-t-checkbox>
                <x-t-checkbox  name="underlined-ch1-check1[]" value="3" >Opció 3</x-t-checkbox>
            </div>
        
        </x-t-field>

        <x-t-field label="Underlined with Form text" for="text-field-21-u-2" underlined  form-text="Adipisicing tempor ea dolore fugiat culpa voluptate qui labore." class="mb-2">
            <x-t-text id="text-field-21-u-2"  placeholder="underlined with form-text" />
        </x-t-field>

        <x-t-field label="Underlined with Form text" for="text-field-21-u-3" underlined  label-placement="start" form-text="Adipisicing tempor ea dolore fugiat culpa voluptate qui labore." class="mb-2">
            <x-t-text id="text-field-21-u-3"  placeholder="underlined with form-text" />
        </x-t-field>
    </div>
</div>


<hr/>

<h5>Color styles</h5>
<p class="mb-1" >Amb l'atribut <code>color=''</code> es defineix el color del camp.</p>
<p class="mb-1" >Es fan servir els colors bootstrap (primary, secondary, info, success, etc.)</p>
<p>Ojo! cal definir també el color de l'input en sí.</p>

<x-t-field label="Color primary" for="text-field-21" label-placement="start" color="primary" class="mb-2">
    <x-t-text id="text-field-21" placeholder="Color primary" color="primary" />
</x-t-field>


<x-t-field label="Color primary" for="text-field-22" label-placement="start" color="primary" class="mb-2">
    <x-t-text id="text-field-22" placeholder="Color primary només al label"  />
</x-t-field>

<x-t-field label="Color success " for="text-field-23" label-placement="start" color="success" class="mb-2">
    <x-t-text id="text-field-23" placeholder="Color success " color="success" />
</x-t-field>

<x-t-field label="Color info boxed" for="text-field-24" label-placement="start" boxed color="info" class="mb-2">
    <x-t-textarea id="text-field-24" rows="4" placeholder="Color info boxed" color="info" />
</x-t-field>

<x-t-field label="Color warning boxed" label-placement="start" boxed for="text-field-25" color="warning" boxed class="mb-2">
    <x-t-text id="text-field-25" placeholder="Color warning boxed" color="warning" />
</x-t-field>

<x-t-field label="Color danger boxed" label-placement="start" boxed for="text-field-26" color="danger" boxed class="mb-2">
    <x-t-select 
    id="text-field-26" 
    placeholder="Color danger boxed"
    color="danger"
    :data="[
        1=>'aaa',
        2=>'bbb',
        3=>'cccccc'
    ]"

/></x-t-field>



<x-t-field label="Color info underlined" for="text-field-cu-24" label-placement="start" underlined color="info" class="mb-2">
    <x-t-textarea id="text-field-cu-24" rows="4" placeholder="Color info underlined" class="text-info" />
</x-t-field>

<x-t-field label="Color warning underlined" label-placement="start" underlined for="text-field-cu-25" color="warning" underlined class="mb-2">
    <x-t-text id="text-field-cu-25" placeholder="Color warning underlined" class="text-warning" />
</x-t-field>

<x-t-field label="Color danger underlined" label-placement="start" underlined for="text-field-cu-26" color="danger" underlined class="mb-2">
    <x-t-select 
    id="text-field-cu-26"  
    class="text-danger" 
    placeholder="Color danger underlined"
    :data="[
        1=>'aaa',
        2=>'bbb',
        3=>'cccccc'
    ]"

/></x-t-field>

<hr class="my-5"/>
{{-- 
<hr/>
<h5>Floating</h5>

<x-t-field label="Floating" for="text-field-float-1" floating class="mb-2">
    <x-t-text id="text-field-float-1" />
</x-t-field> --}}