<div class="d-block d-sm-flex justify-content-between">
    <div>
        <h1>Number inputs</h1>
        <p class="lead">
            Camps numperic. Fem servir l'etiqueta <code>&lt;x-t-number/&gt;</code></p>
            <p class="lead">Es genera un camp numèric natiu.</p>

    </div>
    <div>
       
    </div>
</div>

<hr />

<p class="mb-1">Els camps numèrics només permeter uintroduir valors numèrics.</p>
<p>Mostraran fletxetes per incrementar/decrementar el número.</p>
<x-t-number class="mb-2"/>

<p>Per defecte es pot escriure al camp. Ho podem deshabilitar amb <code>allowInput="false"</code>.</p>

<x-t-number allowInput="false" placeholder="allowInput=false"/>

<hr/>
<p>Podem definir valor màxim  i mínim (atributs <code>min</code> i <code>max</code>).</p>
<x-t-number min="5" max="10" placeholder="min & max" />


<hr/>
<p>Podem definir l'increments amb l'atribut <code>step</code>.</p>

<x-t-number min="10" max="100" step="5" value="10" placeholder="step=5" class="mb-2" />
<x-t-number min="0" max="10" step="0.1" placeholder="step=0.1"/>

<hr/>
<p>Es poden passar els mateixos atributs que al camp de text (mida, color, allowClear...).</p>
<x-t-number color="success"  placeholder="color=success" class="mb-2"/>
<x-t-number size="lg" placeholder="size=lg" class="mb-2"/>
<x-t-number allowClear placeholder="allowClear" allowInput="false" class="mb-2"/>

<hr>
<hr>